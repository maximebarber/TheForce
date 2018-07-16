<h3>Ajouter un module</h3>

<form method="POST" action="index.php?action=add_module">
    <p><?php echo $msg;?></p>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nom du module</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Nom du module" name='nomModule'>
    </div>
      
      
    <div class="form-group col-md-4">
      <label for="inputState">Catégorie</label>
      <select id="inputState" class="form-control"  name='idCategorie'>
          <option selected>Choix...</option>
        
        <?php
        
        //AFFICHER LES CATEGORIES SOUS FORME DE LISTE DEROULANTE
        while($categorie = $categories->fetch()){
        
            echo "<option value='" . $categorie['id_categorie'] . "'>".$categorie['nom_categorie']."</option>";
            
        }

        ?>
        
      </select>
      
    </div>

  </div>
  
  <button type="submit" class="btn btn-primary">Ajouter</button>

</form>

  

  