<div class="center">
    <button><a style="color: black; text-decoration: none;" href="./index.php?action=menu"> Torna al menú principal</a></button>
    <h2>Crea l'horari de l'assignatura:</h2>
    <button id="teoria" onclick="teoria=1, problemes=0, practiques=0">TEORIA</button>
    <button id="problemes" onclick="teoria=0, problemes=1, practiques=0">PROBLEMES</button>
    <button id="practiques" onclick="teoria=0, problemes=0, practiques=1">PRÀCTIQUES</button>

    <button id="refresh" onclick="window.localStorage.clear(); document.cookie='data='; document.cookie= 'push='+ 0;window.location.href='./index.php?action=create_schedule'">Esborrar</button>

    <p class="description">
        Selecciona el tipus de classe que vols afegir i clica i arrossega a l'horari per crear una franja.
        <br/>
        Recorda que pots moure i modificar la franja creada o esborrar les tasques creades.
        Finalment, escriu el nom de l'assignatura i guarda-la per fer-la visible als usuaris.
    </p>
    <form method="post" id="saveform" action="/">
        <label> Branca:
            <select id="branca" name="branca" onchange="getSelectValue();">
                <?php foreach ($branques as $branca):?>
                    <option value="<?php echo $branca['nom']?>"><?php echo $branca['nom']?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <script type="javascript">
            function getSelectValue(){
                var selectedValue = document.getElementById("branca").value;
                alert(selectedValue);
            }
            getSelectValue();

        </script>

        <label>Nom:
            <input id="assig" name="assignatura" required>
        </label>

        <label>Descripció:
            <input id="descripcio" name="descripcio" type="text" value="Assignatura del departament de computació" required>
        </label>

        <button id="saver">Guardar</button>
    </form>
</div>
<div id="calendar"></div>
