<?php include_once("includes/header.php"); ?>
      
       <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" placeholder="Nom d'utilisateur" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mot de passe" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>

     
          
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Se rappeler de moi? </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Mot de passe oubliee?</a>
        </div>
      </div>


      <!-- Register buttons -->
      <div class="text-center">
        <p>tu n'as pas encore de compte? <a href="creation_compte.php">clique ici</a></p>
      </div>
    </form>
  </div>
  <?php include_once("includes/footer.php"); ?>
      
     
