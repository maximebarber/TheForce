<?php echo $msg; ?>

<form id="container" method="POST" action="index.php?action=add_stagiaire">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Prénom</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Prénom" name="prenomStagiaire" required>
        </div>

        <div class="form-group col-md-6">
            <label for="inputPassword4">Nom</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Nom" name="nomStagiaire" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexeStagiaire" id="gridRadios1" value="M" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Homme
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexeStagiaire" id="gridRadios2" value="F">
                    <label class="form-check-label" for="gridRadios2">
                        Femme
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="inputAddress2">Date de naissance</label>
            <input type="date" class="form-control" id="inputAddress2" name="naissanceStagiaire" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Lieu de naissance</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Ville" name="villeStagiaire" required>
        </div>

        <div class="form-group col-md-4">
            <label for="inputAddress2">E-mail</label>
            <input type="email" class="form-control" id="inputAddress2" placeholder="jean-guy@guy.fr" name="emailStagiaire" required>
        </div>


        <div class="form-group col-md-2">
            <label for="inputZip">Téléphone</label>
            <input minlength="10" maxlength="10" type="text" class="form-control" id="inputZip" name="telephoneStagiaire" placeholder="0612345987" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign in</button>
</form>