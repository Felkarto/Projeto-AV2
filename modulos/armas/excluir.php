
<?php
include "classes/DB.class.php";
include "classes/Armas.class.php";
?>


<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $armas = new Armas($_GET['id']);
    $armas->excluir();
    ?>



<?php }?>