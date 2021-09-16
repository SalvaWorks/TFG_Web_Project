<div style="text-align:  center">
    <h2 style="color: white">Selecciona l'assignatura on cercar-hi candidatures:</h2>
    <form method="post" action="./index.php?action=see_cv">
        <select id="assignatura" name="assignatura" onchange="getSelectValue()";>
            <?php foreach ($subjects as $subject):?>
                <option value="<?php echo $subject['nom']?>"><?php echo $subject['nom']?></option>
            <?php endforeach; ?>
        </select>
        <script type="javascript">
            function getSelectValue(){
                var selectedValue = document.getElementById("assignatura").value;
                alert(selectedValue);
            }
            getSelectValue();
        </script>
        <button type="submit" id="sub">Cerca currículums de candidats</button>
    </form>
</div>