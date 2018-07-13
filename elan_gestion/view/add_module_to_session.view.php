

<!-- AFFICHAGE MODULE DANS SESSION -->

<h3>Ajouter un module à une session</h3>

<form method="POST" action="index.php?action=add_module_to_session">

    <!-- comment -->
    <div class="form-group col-md-12">
        <label for="inputState">Intitulé session</label>
        <select id="inputState" class="form-control" name="idSession">
            <option selected>Choix session...</option>

            <?php
            while ($session = $sessions->fetch()) {

                echo '<option value=' . $session["id_session"] . '>' . $session['intitule_session'] . '</option>';
            }
            ?>

        </select>
    </div>

    <div class="form-group col-md-12">
        <label for="inputState">Intitulé module</label>
        <select id="inputState" class="form-control" name="idModule">
            <option selected>Choix module...</option>

            <?php
            while ($listeModule = $listeModules->fetch()) {

                echo '<option value=' . $listeModule["id_module"] . '>' . $listeModule['nom_module'] . '</option>';
            }
            ?>

        </select>
    </div>

    <div class="form-group col-md-3">
        <label for="dureeModule">Durée</label>
        <input min="1" max="20" type="number" class="form-control" id="dureeModule" placeholder="Entre 1 et 20 jours" name="dureeModule">
    </div>

    <button type="submit" class="btn btn-default">Ajouter</button>

</form>

<?php

echo $msg;

?>


