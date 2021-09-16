<div id="wrap">
<div id="afegeix" style="text-align: left">
    <h3> Afegeix una assignatura a un professor</h3>
<form method="post" action="./index.php?action=modify_teacher">
    <label>Id del professor assignat a l'assignatura: </label><input type="number" name="professor_id"><br>
    <label>Id de l'assignatura a assignar:</label> <input type="number" name="nova_assignatura"><br>
    <button type="submit" id="sub2">Assignar assignatura</button>

</form>
</div>
<div id="elimina" style="text-align: right">
    <h3> Desvincula d'una assignatura a un professor</h3>
<form method="post" action="./index.php?action=modify_teacher">
    <label>Id del professor actualment docent de l'assignatura:</label> <input type="number" name="professor_id"><br>
    <label>Id de l'assignatura a eliminar:</label><input type="number" name="vella_assignatura"><br>
    <button type="submit" id="sub2">Desvincular de l'assignatura</button>
</form>
</div>
</div>