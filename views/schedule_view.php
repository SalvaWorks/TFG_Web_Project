<div style="background-color: lightgrey" class="center">
    <button id="sub2"><a style="color: black; text-decoration: none;" href="./index.php?action=menu"> Torna al menú principal</a></button>
    <button id="sub2"><a style="color: black; text-decoration: none;" href="./index.php?action=list_of_subjects&branch=<?php echo $_SESSION['branch_id']; ?>"> Torna a la pàgina anterior </a></button>

    <h2>Aquest és l'horari de l'assignatura: <?php echo $nom_assignatura[0]['nom'];?></h2>
    <button id="Formulari_oferta"><a style="color: black; text-decoration: none;" href="./index.php?action=oferta">M'interessa alguna franja</a></button>
    <p class="description">
    </p>

</div>
<div id="calendar"></div>