
<?php
include "classes/DB.class.php";
include "classes/Mapas.class.php";
?>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    $mapas = new Mapas($_POST['id']);
    $mapas->setHaven($_POST['haven']);
    $mapas->setBind($_POST['bind']);
    $mapas->setIcebox($_POST['icebox']);
    $mapas->setAscent($_POST['ascent']);
    $mapas->setSplit($_POST['split']);
    $mapas->atualizar();
}
?>



<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $mapas = new Mapas($_GET['id']);
    ?>

<form method='post' action=''>
Haven:      <input type="text" name='haven' value='<?php echo $mapas->getHaven(); ?>'></br>
Bind:          <input type="text" name='bind'  value='<?php echo $mapas->getBind(); ?>'></br>
Icebox:     <input type="text" name='icebox' value='<?php echo $mapas->getIcebox(); ?>'></br>
Ascent:     <input type="text" name='ascent' value='<?php echo $mapas->getAscent(); ?>'></br>
Split:     <input type="text" name='split' value=<?php echo $mapas->getSplit(); ?>''></br>
<input type="hidden" name='id'  value='<?php echo $mapas->getId(); ?>'></br>

<input type='submit' name='botao' value='Salvar'>
</form>

<?php }?>