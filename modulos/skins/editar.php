
<?php
include "classes/DB.class.php";
include "classes/Skins.class.php";
?>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    $skins = new Skins($_POST['id']);
    $skins->setSublime($_POST['sublime']);
    $skins->setPrismático($_POST['prismático']);
    $skins->setAvalanche($_POST['avalanche']);
    $skins->setSaqueador($_POST['saqueador']);
    $skins->setGlitch($_POST['glitch']);
    $skins->atualizar();
}
?>



<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $skins = new Skins($_GET['id']);
    ?>

<form method='post' action=''>
Sublime:      <input type="text" name='sublime' value='<?php echo $skins->getSublime(); ?>'></br>
Prismático:          <input type="text" name='prismático'  value='<?php echo $skins->getPrismático(); ?>'></br>
Avalanche:          <input type="text" name='avalanche'  value='<?php echo $skins->getAvalanche(); ?>'></br>
Saqueador:          <input type="text" name='saqueador'  value='<?php echo $skins->getSaqueador(); ?>'></br>
Glitch:          <input type="text" name='glitch'  value='<?php echo $skins->getGlitch(); ?>'></br>

<input type='submit' name='botao' value='Salvar'>
</form>

<?php }?>