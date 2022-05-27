<?php
         if( isset($_POST['filtreProf']))
        {
            $prof_idM =  $_POST['filtreProf'];
        }
?>

<div class="container mt-5">
    <h1>Liste des Professeurs</h1>
    <br>
    <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-prof"?>">
        <button type="button" class="btn btn-primary">AJOUTER UN PROFESSEUR</button>
    </a>
    <br><br>
    <form action="<?=$Constantes::WEB_ROOT."liste-prof"?>" method="post">
        <div class="row">
            <div class="col">
                <select class="form-select w-100" name="filtreProf" aria-label="Default select example">
                <option value="" selected>---Les modules disponibles---</option>
                <?php foreach($modules as $value) : ?>
                    <option value="<?=$value->id?>"><?=$value->libelle?></option>
                <?php endforeach?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
       
      
    </form>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom complet</th>
            <th scope="col">Sexe</th>
            <th scope="col">Grade</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php foreach($profs as $value) : ?>
                <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->nom_complet ?></td>
                    <td><?= $value->sexe ?></td> 
                    <td><?= $value->grade ?></td>
                    <td>                  
                        <button type="button" class="btn btn-outline-info">Affecter classe</button>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between my-4">
        <?php if ($currentPage > 1): ?>
            <a href="<?=$Constantes::WEB_ROOT."liste-prof"?>/?page=<?= $currentPage - 1 ?>" class="btn btn-outline-primary">&laquo; Page Precedente</a>
        <?php endif ?> 
        
        <?php if ($currentPage < $pages ): ?>
            <a href="<?=$Constantes::WEB_ROOT."liste-prof"?>/?page=<?= $currentPage + 1 ?>" class="btn btn-outline-primary ml-auto"> Page Suivante &raquo;</a>
        <?php endif ?> 
   </div>
</div>
<script src="<?=$Constantes::WEB_ROOT.'js/listeProf.script.js'?>"></script>



    
