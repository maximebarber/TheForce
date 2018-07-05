<form id="container" method="POST" action="index.php?action=insert_stagiaire">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Prénom</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Prénom" name="prenomStagiaire">
        </div>

        <div class="form-group col-md-6">
            <label for="inputPassword4">Nom</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Nom" name="nomStagiaire">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexeStagiaire" id="gridRadios1" value="H" checked>
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
            <input type="date" class="form-control" id="inputAddress2" name="naissanceStagiaire">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Ville</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Ville" name="villeStagiaire">
        </div>

        <div class="form-group col-md-4">
            <label for="inputAddress2">E-mail</label>
            <input type="email" class="form-control" id="inputAddress2" placeholder="jean-guy@guy.fr" name="emailStagiaire">
        </div>


        <div class="form-group col-md-2">
            <label for="inputZip">Téléphone</label>
            <input type="text" class="form-control" id="inputZip" name="telephoneStagiaire">
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign in</button>
</form>