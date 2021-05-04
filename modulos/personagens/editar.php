
<?php
include "classes/DB.class.php";
include "classes/Personagens.class.php";
?>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    $personagens = new Personagens($_POST['id']);
    $personagens->setJett($_POST['jett']);
    $personagens->setKilljoy($_POST['killjoy']);
    $personagens->setSage($_POST['sage']);
    $personagens->setSkye($_POST['skye']);
    $personagens->setBreach($_POST['breach']);
    $personagens->atualizar();
}
?>



<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $personagens = new Personagens($_GET['id']);
    ?>

<form method='post' action=''>
Jett:      <input type="text" name='jett' value='<?php echo $personagens->getJett(); ?>'></br>
Killjoy:          <input type="text" name='killjoy'  value='<?php echo $personagens->getKilljoy(); ?>'></br>
Sage:     <input type="text" name='sage' value='<?php echo $personagens->getSage(); ?> '></br>
Skye:     <input type="text" name='skye' value='<?php echo $personagens->getSkye(); ?>'></br>
Breach:     <input type="text" name='breach' value='<?php echo $personagens->getBreach(); ?>'></br>
<input type="hidden" name='id'  value='<?php echo $personagens->getId(); ?>'></br>

<input type='submit' name='botao' value='Salvar'>
</form>

<?php }?>