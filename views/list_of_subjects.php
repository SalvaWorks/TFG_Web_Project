
<?php if (isset($_GET['branch'])) {
    unset($_SESSION['branch_id']);
    $_SESSION['branch_id'] = $_GET['branch'];
}?>

<h2 class="title1">Llistat d'assignatures amb ofertes de la branca de: <?php echo $name[0]['nom'];?></h2>
<ul class="tilesWrap">
<?php $count = 0; foreach ($subjects as $subject): //assignatures?>
    <li id="subject_"<?php echo ($count+1);?>>
        <h2><?php echo $count; $count++; ?></h2>
        <h3><?php echo $subject['nom']; ?> </h3>
        <p><?php echo $subject['descripcio'];?> </p>
        <button onclick="window.location.href='./index.php?action=view_schedule&subject=<?php echo $subject['id']?>'">
            Veure horari
        </button>
    </li>
<?php endforeach;?>
</ul>
