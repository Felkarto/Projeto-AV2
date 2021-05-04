
<?php
include "classes/DB.class.php";
include "classes/Agentes.class.php";
?>

<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    $agentes = new Agentes($_POST['id']);
    $agentes->setSentinelas($_POST['sentinelas']);
    $agentes->setControladores($_POST['controladores']);
    $agentes->setDuelistas($_POST['duelistas']);
    $agentes->setIniciadores($_POST['iniciadores']);
    $agentes->setEspectadores($_POST['espectadores']);
    $agentes->atualizar();
}
?>



<?php
if (isset($_GET['id']) and is_numeric($_GET['id'])) {
    $agentes = new Agentes($_GET['id']);
    ?>

<form method='post' action=''>
Sentinelas:      <input type="text" name='sentinelas' value='<?php echo $agentes->getSentinelas(); ?>'></br>
Controladores:          <input type="text" name='controladores'  value='<?php echo $agentes->getControladores(); ?>'></br>
Duelistas:     <input type="text" name='duelistas' value='<?php echo $agentes->getDuelistas(); ?>'></br>
Iniciadores:     <input type="text" name='iniciadores' value='<?php echo $agentes->getIniciadores(); ?>'></br>
Espectadores:     <input type="text" name='espectadores' value='<?php echo $agentes->getEspectadores(); ?>'></br>
<input type="hidden" name='id'  value='<?php echo $agentes->getId(); ?>'></br>

<input type='submit' name='botao' value='Salvar'>
</form>

<?php }?>