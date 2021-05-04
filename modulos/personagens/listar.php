<?php
include "classes/DB.class.php";
include "classes/Personagens.class.php";
$personagens = Personagens::listar();
?>

<table>
<tr>
    <th>ID</th>
    <th>JETT</th>
    <th>KILLJOY</th>
    <th>SAGE</th>
    <th>SKYE</th>
    <th>BREACH</th>

</tr>

<?php
if ($personagens) {
    foreach ($personagens as $personagens) {
        ?>
    <tr>
        <td><?php echo $personagens->getId(); ?></td>
        <td><?php echo $personagens->getJett(); ?></td>
        <td><?php echo $personagens->getKilljoy(); ?></td>
        <td><?php echo $personagens->getSage(); ?></td>
        <td><?php echo $personagens->getSkye(); ?></td>
        <td><?php echo $personagens->getBreach(); ?></td>
        <td><a href="?modulo=personagens&acao=editar&id=<?php echo $personagens->getId(); ?>">Editar</a></td>
        <td><a href="?modulo=personagens&acao=excluir&id=<?php echo $personagens->getId(); ?>">Excluir</a></td>

    </tr>
<?php
}
} else {
    echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";
}
?>
</table>