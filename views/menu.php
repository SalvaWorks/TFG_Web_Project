
<h2 class="title1">Benvingudes al portal web d'ofertes de docència al departament de Ciències de la Computació de la UAB. </h2>
<ul class="tilesWrap">
    <?php $count = 0; foreach ($branches as $branch): ?>
    <li>
        <h2><?php echo $count; $count++; ?></h2>
        <h3><?php echo $branch['nom']?></h3>
        <p><?php echo $branch['descripcio']?></p>

        <button id="veure_horari" onclick="window.location.href='./index.php?action=list_of_subjects&branch=<?php echo $branch['id']?>'">
            Veure assignatures
        </button>
    </li>
    <?php endforeach;?>
</ul>
</html>