<!DOCTYPE html>
<html lang="en">
<body class="registerlog">
<h1 class="title1">Aqui pots registrar un docent actual del departament i vincular-lo a la seva assignatura</h1>
<div class="reg">
    <form id="reg" method="post" action="./index.php?action=register_teacher">
        <h2 class="regword">Formulari de registre:</h2>
        <br>
        <label>Nom:</label><br>
        <input type="text" name="name" placeholder="Alex" id="name">
        <br><br>
        <label>Cognoms:</label><br>
        <input type="text" name="surnames"
               placeholder="Salvador Abad" id="surnames">
        <br><br>
        <label>Correu electrònic:</label><br>
        <input type="email" name="mail"
               placeholder="Example.mail@gmail.com" id="mail">
        <br><br>
        <label>Contrasenya d'accès:</label><br>
        <input type="password" name="pass"
               placeholder="arQj62L_v2" id="pass">
        <br><br>
        <button type="submit" id="sub">Registra't!</button>
        <br><br>
    </form>
</div>
</body>