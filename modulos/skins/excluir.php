
<?php
include "classes/DB.class.php";
include "classes/Skins.class.php";
?>


<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $skins = new Skins($_GET['id']);
    $skins->excluir();
    ?>



<?php }?>