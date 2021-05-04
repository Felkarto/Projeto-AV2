
<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    include "classes/Skins.class.php";
    $skins = new Skins();
    $skins->setSublime($_POST['sublime']);
    $skins->setPrismático($_POST['primático']);
    $skins->setAvalanche($_POST['avalanche']);
    $skins->setSaqueador($_POST['saqueador']);
    $skins->setGlitch($_POST['glitch']);
    $skins->adicionar();
}

?>

<form method='post' action=''>
Sublime:       <input type="text" name='sublime'></br>
Prismático:      <input type="text" name='primático'></br>
Avalanche:   <input type="text" name='avalanche'></br>
Saqueador:   <input type="text" name='Saqueador'></br>
Glitch:   <input type="text" name='glitch'></br>

<input type='submit' name='botao' value='Salvar'>

</form>