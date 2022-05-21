<?php
         if( isset($_POST['filtreProf']))
        {
            $prof_idM =  $_POST['filtreProf'];
        }
?>

<div class="container mt-5">
    <h1>Liste des Professeurs</h1>
    <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-prof"?>">
        <button type="button" class="btn btn-primary">AJOUTER UN PROFESSEUR</button>
    </a>
    <form action="<?=$Constantes::WEB_ROOT."liste-prof"?>" method="post">
        <select class="form-select" name="filtreProf" aria-label="Default select example">
            <option value="" selected>---Les modules disponibles---</option>
            <?php foreach($modules as $value) : ?>
                <option value="<?=$value->id?>"><?=$value->libelle?></option>
            <?php endforeach?>
        </select>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
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
            <?php foreach($filtreProfs as $value) : ?>
                <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->nom_complet ?></td>
                    <td><?= $value->sexe ?></td> 
                    <td><?= $value->grade ?></td>
                    <td>
                        <i class="fa fa-edit fa-2x blue"></i>
                        <i class="fa fa-trash fa-2x red"></i>
                        <i class="fa-solid fa-circle-info fa-2x green"></i>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>

</div>
<script src="<?=$Constantes::WEB_ROOT.'js/listeProf.script.js'?>"></script>



    
