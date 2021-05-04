
<?php
if (isset($_POST['botao']) && $_POST['botao'] == "Salvar") {
    include 'classes/Personagens.class.php';
    $personagens = new Personagens();
    $personagens->setJett($_POST['jett']);
    $personagens->setKilljoy($_POST['killjoy']);
    $personagens->setSage($_POST['sage']);
    $personagens->setSkye($_POST['skye']);
    $personagens->setBreach($_POST['breach']);
    $personagens->adicionar();
}

?>


<form method='post' action=''>
Jett:      <input type="text" name='jett'></br>
Killjoy:          <input type="text" name='killjoy'></br>
Sage:     <input type="text" name='sage'></br>
Skye:     <input type="text" name='skye'></br>
Breach:     <input type="text" name='breach'></br>

<input type='submit' name='botao' value='Salvar'>

</form>