
<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    include 'classes/Mapas.class.php';
    $mapas = new Mapas();
    $mapas->setHaven($_POST['haven']);
    $mapas->setBind($_POST['bind']);
    $mapas->setIcebox($_POST['icebox']);
    $mapas->setAscent($_POST['ascent']);
    $mapas->setSplit($_POST['split']);
    $mapas->adicionar();
}

?>


<form method='post' action=''>
Haven:      <input type="text" name='haven'></br>
Bind:          <input type="text" name='bind'></br>
Icebox:     <input type="text" name='icebox'></br>
Ascent:     <input type="text" name='ascent'></br>
Split:     <input type="text" name='split'></br>

<input type='submit' name='botao' value='Salvar'>

</form>