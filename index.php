<?php 
session_start();
include_once('include/header.php');
require_once('php/list.php'); ?>

<?php

if (!isset($_SESSION['user'])) {
   header('location:connexion.php');
}

?>




   
    <section class="container">
    <div class="col-12 my-1" id="mychat">
        <div class="row h-100">
            <div class="col-12 col-md-4 h-100 p-3 d-none d-sm-block" id="imagepres">
            <div class="card">
 <p id="userImg"></p>
  <h1 id="userName"></h1>
  <p id="userPseudo"></p>

  <a href='deconnexion.php' class='btn btn-warning'>Déconnexion</a>
</div>
      

            </div>
            <div class="col-12 col-md-8 h-100 d-flex flex-wrap align-items-end"> <div class="p-2" id="discussion">
                <ul id="list" class="float-left"></ul>
            </div>
            <div class="col-12 saisie mb-4">
                <div id="istyping"></div>
            <form method="POST">
                <div class="input-group">
                 
                    <input type="text" class="form-control" id="texte" placeholder="Entrez votre texte">
                    <div class="input-group-append">
                        <span class=" btn btn-primary" id="valid" style="cursor:pointer">Envoyer</span>
                    </div>
                   
                   
                    
                </div>

                <div class="form-check">
        <input class="form-check-input" type="checkbox" id="autoscroll">
        <label class="form-check-label" for="autoSizingCheck2">
          Auto Scroll
        </label>
        
      </div>
                </form>
             
            </div>
        </div>
       
          
        </div>
   
  
    </section>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
<?php include_once('include/footer.php'); ?>