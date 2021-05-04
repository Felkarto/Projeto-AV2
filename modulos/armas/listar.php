<?php
include "classes/DB.class.php";
include "classes/Armas.class.php";
$armas = Armas::listar();
?>

<table>
<tr>
    <th>ID</th>
    <th>SUB</th>
    <th>FUZIS</th>
    <th>PISTOLAS</th>
    <th>ESCOPETAS</th>
    <th>RIFLES</th>

</tr>

<?php
if ($armas) {
    foreach ($armas as $armas) {
        ?>
    <tr>
        <td><?php echo $armas->getId(); ?></td>
        <td><?php echo $armas->getSub(); ?></td>
        <td><?php echo $armas->getFuzis(); ?></td>
        <td><?php echo $armas->getPistolas(); ?></td>
        <td><?php echo $armas->getEscopetas(); ?></td>
        <td><?php echo $armas->getRifles(); ?></td>
        <td><a href="?modulo=armas&acao=editar&id=<?php echo $armas->getId(); ?>">Editar</a></td>
        <td><a href="?modulo=armas&acao=excluir&id=<?php echo $armas->getId(); ?>">Excluir</a></td>

    </tr>
<?php
}
} else {
    echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";
}
?>
</table>