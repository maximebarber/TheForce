<form method="POST" action="index.php?action=insert_session">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Intitulé Session</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Intitulé Session" name="intitule">
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Date du début de la formation</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="dateDebut">
  </div>
    
  <div class="form-group">
    <label for="exampleInputPassword2">Date de la fin de la formation</label>
    <input type="date" class="form-control" id="exampleInputPassword2" name="dateFin">
  </div>
    
  <div class="form-group">
    <label for="exampleInputPassword3">Nombre de places</label>
    <input type="text" class="form-control" id="exampleInputPassword3" name="nbPlaces">
  </div>
    
  <div class="form-group">
    <label for="exampleInputFile">Image</label>
    <input type="file" id="exampleInputFile" name="img">
  </div>
    
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<!-- @TODO date fin doit être postérieure à la date début -->