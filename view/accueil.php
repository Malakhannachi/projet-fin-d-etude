<?php ob_start(); ?>

<div id="contenu">
    

</div>






<?php
$contenu = ob_get_clean();
require "template/template.php";