<?php
include "classes/Skins.class.php";
$skinss = Skins::listar();
?>
<table>
<tr>
    <th>ID</th>
    <th>SUBLIME</th>
    <th>PRISMÁTICO</th>
    <th>AVALANCHE</th>
    <th>SAQUEADOR</th>
    <th>GLITCH</th>
</tr>

<?php
if ($skins) {
    foreach ($skins as $skins) {
        ?>
    <tr>
        <td><?php echo $skins->getId(); ?></td>
        <td><?php echo $skins->getSublime(); ?></td>
        <td><?php echo $skins->getPrismático(); ?></td>
        <td><?php echo $skins->getAvalanche(); ?></td>
        <td><?php echo $skins->getSaqueador(); ?></td>
        <td><?php echo $skins->getGlitch(); ?></td>
        <td><a href="?modulo=skins&acao=editar&id=<?php echo $skins->getId(); ?>">Editar</a></td>
        <td><a href="?modulo=skins&acao=ecluir&id=<?php echo $skins->getId(); ?>">Excluir</a></td>

    </tr>
<?php
}
} else {
    echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";
}
?>
</table>