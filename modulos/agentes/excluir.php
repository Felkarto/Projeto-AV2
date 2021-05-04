
<?php
include "classes/DB.class.php";
include "classes/Agentes.class.php";
?>


<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $agentes = new Agentes($_GET['id']);
    $agentes->excluir();
    ?>



<?php }?>