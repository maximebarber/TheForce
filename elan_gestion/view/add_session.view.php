<!-- AFFICHAGE MESSAGE SUCCES/ERREUR -->
<?php echo $msg ?>

<!-- FORMULAIRE AJOUT SESSION -->
<form method="POST" action="index.php?action=add_session" enctype="multipart/form-data">

    <div class="form-group">
        <label for="intitule">Intitulé Session</label>
        <input type="text" class="form-control" id="intitule" placeholder="Intitulé Session" name="intitule" required>
    </div>

    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="dateDebut">Date du début de la formation</label>
            <input type="date" class="form-control" id="dateDebut" name="dateDebut" required>
        </div>

        <div class="form-group col-md-4">
            <label for="dateFin">Date de la fin de la formation</label>
            <input type="date" class="form-control" id="dateFin" name="dateFin" required>
        </div>

        <div class="form-group col-md-4">
            <label for="nbPlaces">Nombre de places</label>
            <input type="text" class="form-control" id="nbPlaces" placeholder="Entre 1 et 20" name="nbPlaces" required>
        </div>

    </div>

    <!--     <div class="form-group">
            <label for="InputFile">Image</label>
            <input type="file" id="InputFile" name="img" accept="file_extension|image/*">
        </div> -->

    <button type="submit" name="submit" class="btn btn-default">Ajouter</button>
</form>