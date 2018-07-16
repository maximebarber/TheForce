

<!-- AFFICHAGE DE L'AJOUT D'UN STAGIAIRE DANS UNE SESSION -->
<!-- AFFICHAGE DE LA PREMIER LISTE DEROULANTE AVEC TOUTES LES SESSIONS DISPONIBLES -->
<h3>Ajouter un stagiaire à une session</h3>

<?php echo $msg; ?>

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

    <!-- AFFICHAGE DE LA DEUXIEME LISTE DEROULANTE AVEC TOUS LES STAGIARIRES INSCRITS -->
    <div class="form-group col-md-12">
        <label for="inputState">Stagiaire</label>
        <select id="inputState" class="form-control" name="idStagiaire">
            <option selected>Stagiaire</option>

            <?php
            while ($listeStagiaire = $listeStagiaires->fetch()) {

                echo '<option value=' . $listeStagiaire["id_stagiaire"] . '>' . $listeStagiaire['prenom_stagiaire'] .' '. $listeStagiaire['nom_stagiaire']. ' - '. $listeStagiaire['email_stagiaire'] . '</option>';
            }
            ?>

        </select>
    </div>

    <button type="submit" class="btn btn-default">Ajouter</button>

</form>

