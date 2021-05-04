
<?php
include "classes/DB.class.php";
include "classes/Mapas.class.php";
?>


<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $mapas = new Mapas($_GET['id']);
    $mapas->excluir();
    ?>



<?php }?>