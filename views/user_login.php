<!DOCTYPE html>
<html lang="en">
<body class="registerlog">
<?php if ($_SESSION['ko']!=1){
    ?>
<h1>Logueja al portal web si vols inscriure't en alguna vacant!</h1>
<?php }?>
<div class="reg">
    <form id="reg" method="post" action="./index.php?action=login_user">
        <h2 class="regword">Formulari d'inici de sessió:</h2>
        <br>
        <label>Correu electrònic</label><br>
        <input type="email" name="email"
               placeholder="exemple@mail.com" id="email">
        <br><br>
        <label>Contrasenya</label><br>
        <input type="password" name="password"
               placeholder="asEKjdn4i!-" id="password">
        <br><br><br>
        <button type="submit" id="sub">Inicia sessió</button>
        <br><br>
        <h3 class="regword">No tens un compte?</h3>

        <h3 class="regword"><a href="index.php?action=register_user" id="reglink">Registra't aqui</a></h3>
    </form>
</div>
</body>
</html>