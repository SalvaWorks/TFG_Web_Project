

<h2 class="title1" style="text-align: center">Emplena el formulari d'oferta per l'assignatura <?php echo $subject_name?></h2>
<div class="reg">
    <?php ini_set('upload_max_filesize', '5M'); ?>
    <form id="reg" method="post" action="./index.php?action=save_cv&fringes=<?php echo count($franges); ?>">
        <h3 class="regword">Selecciona amb nombres de l'1 al 5 la teva preferència per cada franja on 1 és interès nul, i 5 és màxim:</h3>
    <?php $count=0;
    foreach ($franges as $fringe):
        $count=$count+1; ?>
        <label style="text-align: justify">Preferència per <?php
            echo $fringe['dia'].': ';
            if ($fringe['tipus']==0){
                echo 'Teoria';
            }elseif ($fringe['tipus']==1){
                echo 'Problemes';
            }
            else{
                echo 'Pràctiques';
            }
            ?> de <?php echo substr($fringe['hora_inici'],0,5);?> a
            <?php echo substr($fringe['hora_fi'],0,5);?></label>
        <select name="priority_<?php echo $count;?>">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
    <br>
    <?php endforeach; ?>
        <br><br>
        <button type="submit" id="sub">Envia el formulari</button>
        <br><br>
    </form>
</div>

