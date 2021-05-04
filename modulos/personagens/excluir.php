
<?php
include "classes/DB.class.php";
include "classes/Personagens.class.php";
?>


<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $agentes = new personagens($_GET['id']);
    $agentes->excluir();
    ?>



<?php }?>