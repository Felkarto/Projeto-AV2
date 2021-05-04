<?php
include "classes/DB.class.php";
include "classes/Agentes.class.php";
$agentes = Agentes::listar();
?>

<table>
<tr>
    <th>ID</th>
    <th>SENTINELAS</th>
    <th>CONTROLADORES</th>
    <th>DUELISTAS</th>
    <th>ESCOPETAS</th>
    <th>ESPECTADORES</th>

</tr>

<?php
if ($agentes) {
    foreach ($agentes as $agentes) {
        ?>
    <tr>
        <td><?php echo $agentes->getId(); ?></td>
        <td><?php echo $agentes->getSentinelas(); ?></td>
        <td><?php echo $agentes->getControladores(); ?></td>
        <td><?php echo $agentes->getDuelistas(); ?></td>
        <td><?php echo $agentes->getEscopetas(); ?></td>
        <td><?php echo $agentes->getEspectadores(); ?></td>
        <td><a href="?modulo=agentes&acao=editar&id=<?php echo $agentes->getId(); ?>">Editar</a></td>
        <td><a href="?modulo=agentes&acao=excluir&id=<?php echo $agentes->getId(); ?>">Excluir</a></td>

    </tr>
<?php
}
} else {
    echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";
}
?>
</table>