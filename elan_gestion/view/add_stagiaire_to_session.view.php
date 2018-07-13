

<!-- AFFICHAGE STAGIAIRE DANS SESSION -->

<h3>Ajouter un stagiaire à une session</h3>

<form method="POST" action="index.php?action=add_stagiaire_to_session">

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
        <label for="inputState">Stagiaire</label>
        <select id="inputState" class="form-control" name="idStagiaire">
            <option selected>Stagiaire</option>

            <?php
            while ($listeStagiaire = $listeStagiaires->fetch()) {

                echo '<option value=' . $listeStagiaire["id_stagiaire"] . '>' . $listeStagiaire['prenom_stagiaire'] .' '. $listeStagiaire['nom_stagiaire']. '</option>';
            }
            ?>

        </select>
    </div>

    <button type="submit" class="btn btn-default">Ajouter</button>

</form>

<?php

echo $msg;

?>

