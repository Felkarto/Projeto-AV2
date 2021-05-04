<?php
include "classes/DB.class.php";
include "classes/Mapas.class.php";
$mapas = Mapas::listar();
?>

<table>
<tr>
    <th>ID</th>
    <th>HAVEN</th>
    <th>BIND</th>
    <th>ICEBOX</th>
    <th>ASCENT</th>
    <th>ESPECTADORES</th>

</tr>

<?php
if ($mapas) {
    foreach ($mapas as $mapas) {
        ?>
    <tr>
        <td><?php echo $mapas->getId(); ?></td>
        <td><?php echo $mapas->getHaven(); ?></td>
        <td><?php echo $mapas->getBind(); ?></td>
        <td><?php echo $mapas->getIcebox(); ?></td>
        <td><?php echo $mapas->getAscent(); ?></td>
        <td><?php echo $mapas->getSplit(); ?></td>
        <td><a href="?modulo=mapas&acao=editar&id=<?php echo $mapas->getId(); ?>">Editar</a></td>
        <td><a href="?modulo=mapas&acao=excluir&id=<?php echo $mapas->getId(); ?>">Excluir</a></td>

    </tr>
<?php
}
} else {
    echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";
}
?>
</table>