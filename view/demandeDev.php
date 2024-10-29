<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero">Devis Gratuit</h1>
        <p class="text-hero">Recevez Votre Devis Sur-Mesure</p>
    
</section>

 <section id="devis" class="devis-background1">
    <div class="devis-content">
    <h2 class="title-devis1">Illuminez votre message - Contactez-nous</h2>
    <p class="text-devis1">Vous avez des questions ou êtes prêt à commencer avec nos services ? Notre équipe est là pour vous aider !</p>
    </div> 
    <div class="form devis-background2" >
    <h2 class="title-devis1">Demander un devis</h2>
            <form action="index.php?action=addDevis" method="post" class="formulaire">
                <div class="form-group " >
                    <div class="nom">
                        <label for="nom" class="label-devis">Nom</label>
                        <input type="text" name="nom" id="nom" class="input" placeholder="nom">
                        <?php if (!empty($_SESSION["errors"]['nom'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['nom']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="nom">
                        <label for="prenom" class="label-devis">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom">
                        <?php if (!empty($_SESSION["errors"]['prenom'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['prenom']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="list">
                    <label for="telephone"  class="label-devis">Numéro de téléphone</label>
                    <input type="tel" name="telephone" id="telephone" class="input" placeholder="06 00 00 00 00">
                    <?php if (!empty($errors['tel'])): ?>
                <div class="error"><?php echo $errors['tel']; ?></div>
            <?php endif; ?>
                </div>
                <div class="list">
                    <label for="email" class="label-devis">Email</label>
                    <input type="text" name="email" id="email" class="input" placeholder="email">
                    <?php if (!empty($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <div class="nom" style="position: relative;">
                        <label for="ville" class="label-devis">Ville</label>
                        <input type="text" name="ville" id="ville" class="input" placeholder="Recherchez une ville" required>
                        <ul id="villeResults" class="dropdown-menu"></ul> <!-- For displaying search results -->
                        <?php if (!empty($_SESSION["errors"]['ville'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['ville']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="nom">
                        <label for="codePostal" class="label-devis">Code Postal</label>
                        <select name="codePostal" id="codePostal" class="input" disabled required>
                            <option value="">Sélectionnez un code postal</option>
                        </select>
                        <?php if (!empty($_SESSION["errors"]['codePostal'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['codePostal']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="list">
                    <label for="adresse" class="label-devis">Adresse</label>
                    <select name="adresse" id="adresse" class="input" disabled required>
                        <option value="">Sélectionnez une adresse</option>
                    </select>
                    <?php if (!empty($_SESSION["errors"]['ville'])): ?>
                        <div class="error"><?php echo $_SESSION["errors"]['ville']; ?></div>
                    <?php endif; ?>
                </div>

                
                <div class="list">
                    <label for="id_services" class="label-devis">sélectionnez un service</label>
                    <select name=" liste_Service" id="id_services" class="input">
                        <option value="">sélectionnez un service</option>
                        <?php foreach ($services as $ser) : ?>  <!-- boucle pour afficher liste des services -->
                        <option value="<?php echo $ser['id_Services']; ?>"><?php echo htmlspecialchars($ser['nom_Ser']?? ''); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="list">
                    <label for="besoin"  class="label-devis">Votre besoin</label>
                    <textarea name="besoin" id="bsoin" rows="5" placeholder="Votre besoin" > </textarea>
                    <?php if (!empty($errors['besoin'])): ?>
                        <div class="error"><?php echo $errors['besoin']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="list">
                    <button class="btn-avis" type="submit" name="submit">Envoyer <span>&#x2197;</span></button>
                </div>
            </form>
        </div>

</section>



<script>
// attendre le chargement total de la page
document.addEventListener('DOMContentLoaded', function() {
    const villeInput = document.getElementById('ville');
    const villeResults = document.getElementById('villeResults');
    const codePostalSelect = document.getElementById('codePostal');
    const adresseSelect = document.getElementById('adresse');

    let selectedVille = null; 

    // Handle ville search input
    villeInput.addEventListener('input', function() {
        // récuperer les données taper par l'utilisateur
        const query = villeInput.value.trim();
        // tester si la longueur des données est inf à 3
        if (query.length < 3) {
            villeResults.innerHTML = '';
            return;
        }


        // Récuperer les villes à partir de l'API
        fetch(`https://geo.api.gouv.fr/communes?nom=${query}&fields=nom,codesPostaux&boost=population&limit=5`)
            .then(response => response.json()) // convertir le format json en format javascript
            .then(data => {
                // suppression des suggestions précédentes
                villeResults.innerHTML = '';
                // boucle sur les données récupérées à partir de l'API
                data.forEach(city => {
                    // créer une element de liste (li)
                    const li = document.createElement('li');
                    // mettre le nom de la ville dans le li
                    li.textContent = city.nom;
                    li.dataset.nom = city.nom;
                    li.dataset.codesPostaux = JSON.stringify(city.codesPostaux); // Store postal codes as JSON
                    // ajouter le nouveau li créé (nom de la ville) sous ul (villeResult)
                    villeResults.appendChild(li);
                });
            });
    });

    // Handle selection of ville from search results
    villeResults.addEventListener('click', function(event) {
        if (event.target.tagName === 'LI') {
            selectedVille = event.target.dataset.nom;
            villeInput.value = selectedVille;
            villeResults.innerHTML = ''; // Clear search results

            // Populate postal codes based on selected ville
            const codesPostaux = JSON.parse(event.target.dataset.codesPostaux);
            codePostalSelect.innerHTML = '<option value="">Sélectionnez un code postal</option>';
            codesPostaux.forEach(postalCode => {
                const option = document.createElement('option');
                option.value = postalCode;
                option.textContent = postalCode;
                codePostalSelect.appendChild(option);
            });
            codePostalSelect.disabled = false;
            adresseSelect.disabled = true; // Reset address field
            adresseSelect.innerHTML = '<option value="">Sélectionnez une adresse</option>';
        }
    });

    // Handle postal code selection
    codePostalSelect.addEventListener('change', function() {
        const selectedPostalCode = codePostalSelect.value;
        if (selectedPostalCode) {
            // Fetch addresses based on selected ville and postal code
            fetch(`https://api-adresse.data.gouv.fr/search/?q=${selectedVille}&postcode=${selectedPostalCode}&type=street`)
                .then(response => response.json())
                .then(data => {
                    adresseSelect.innerHTML = '<option value="">Sélectionnez une adresse</option>';
                    // boucle sur les données récupérées à partir de l'API
                    data.features.forEach(feature => {
                        // créer une option (sous select des adresses) pour chaque adresse récupérée
                        const option = document.createElement('option');
                        // la valeur de l'adresse est le champ label des données récupérées
                        option.value = feature.properties.label;
                        option.textContent = feature.properties.label;
                        // placer l'option sous select adresse
                        adresseSelect.appendChild(option);
                    });
                    // pour pouvoir utiliser la liste déroulante des adresses (grise précédement)
                    adresseSelect.disabled = false;
                });
        } else {
            adresseSelect.disabled = true;
            adresseSelect.innerHTML = '<option value="">Sélectionnez une adresse</option>';
        }
    });

    // Hide villeResults when clicking outside
    document.addEventListener('click', function(event) {
        if (!villeInput.contains(event.target) && !villeResults.contains(event.target)) {
            villeResults.innerHTML = '';
        }
    });
});

</script>



<?php
unset($_SESSION["errors"]); // vider les erreurs
$contenu = ob_get_clean();
require "template/template.php";