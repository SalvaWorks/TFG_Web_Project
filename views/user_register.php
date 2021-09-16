<!DOCTYPE html>
<html lang="en">
<body class="registerlog">
<h1>Registra't al portal web si estàs interessada!</h1>

<div class="reg">
    <form name="registerform" id="reg" method="post" action="./index.php?action=register_user" enctype="multipart/form-data">
        <h2 class="regword">Formulari de registre:</h2>
        <br>
        <label>Nom:</label><br>
        <input type="text" name="name" placeholder="Alex" id="name" required>
        <br><br>
        <label>Cognoms:</label><br>
        <input type="text" name="surnames"
               placeholder="Salvador Abad" id="surnames" required>
        <br><br>
        <label>Correu electrònic:</label><br>
        <input type="email" name="mail"
               placeholder="Example.mail@gmail.com" id="mail" required>
        <br><br>
        <label>Telèfon de contacte:</label><br>
        <input type="text" name="phone" placeholder="612345678" id="phone" required>
        <br><br>
        <label>Contrasenya:</label><br>
        <input type="password" name="pass"
               placeholder="arQj62L_v2" id="pass" required>
        <br><br>
        <label>Adjunta el teu Currículum aqui:</label>
        <input type="file" id="cv" name="cv" required>
        <br><br>
        <button type="submit" id="sub">Registra't!</button>
        <br><br>
    </form>
</div>
</body>