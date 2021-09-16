<h2 class="title1">LLista de candidats a l'assignatura <?php echo $subject_name.': '; if (count($usersWithCV)<1){
    echo 'No hi ha candidats actualment';}?></h2>
<ul class="tilesWrap">
    <?php $counter=0; foreach ($usersWithCV as $cv): ?>
    <li id="offer">
        <h2><?php echo $count; $count++; ?></h2>
        <h3> Nom: <?php echo $cv['nom']; ?> </h3>
        <h3> Email: <?php echo $cv['mail']; ?> </h3>
        <?php $franges = getFrangesUser($cv['id'], $id);
        foreach ($franges as $frange): ?>
            <?php $info= getFrangeInfo($frange['id_franja'])[0];?>
               <p><?php echo $info['dia'];?> de <?php echo $info['hora_inici'];?> a <?php echo $info['hora_fi'];?> - <?php echo $info['tipus'];?>  </p>
               <p><?php echo $frange['prioritat'];//preferencia?></p>
        <?php endforeach; ?>
        <button onclick="window.location.href='/WebTFGProject/curriculums/<?php echo $cv['nom_cv']?>'">Veure CV </button>
    </li>
    <?php endforeach; ?>
</ul>

