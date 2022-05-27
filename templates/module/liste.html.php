
<?php 
    if(isset($_SESSION['errors'])){
    $errors=$_SESSION['errors'];
    unset($_SESSION['errors']);
   }
?>
<?php
         if( isset($_POST['filtreModule']))
        {
            $module_idP =  $_POST['filtreModule'];
        }
?>

<div class="container mt-5">
    <h1>Liste des Modules</h1>

    <form action="<?=$Constantes::WEB_ROOT."add-module"?>" method="POST" role="form">
        <div class="row">
            <div class="form-outline">
                <label class="form-label" for="firstName">Libelle</label>
                <div class="row">
                    <div class="col">
                        <input  type="text" id="firstName" name="libelle" class="form-control form-control-lg w-100" />
                        <?php if(isset($errors)): ?>
                            <small style="color:red"> <?= $errors; ?> </small>
                        <?php endif ?><br>
                    </div>
                    <div class="col">
                        <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Ajouter" />  <br>  
                    </div>
                    
                </div>
                
            </div>
        </div><br>
    </form>
    <form action="<?=$Constantes::WEB_ROOT."liste-module"?>" method="post">
    <div class="row">
        <div class="col">
            <select class="form-select w-100" name="filtreModule" aria-label="Default select example">
                <option value="" selected>---Les professeurs disponibles---</option>
                <?php foreach($profs as $value) : ?>
                    <option value="<?=$value->id?>"><?=$value->nom_complet?></option>
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
            <th scope="col">Libelle</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($modules as $value) : ?>
            <tr>
                <td><?= $value->id ?></td>
                <td><?= $value->libelle ?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between my-4">
        <?php if ($currentPage > 1): ?>
            <a href="<?=$Constantes::WEB_ROOT."liste-module"?>/?page=<?= $currentPage - 1 ?>" class="btn btn-outline-primary">&laquo; Page Precedente</a>
        <?php endif ?> 
        
        <?php if ($currentPage < $pages ): ?>
            <a href="<?=$Constantes::WEB_ROOT."liste-module"?>/?page=<?= $currentPage + 1 ?>" class="btn btn-outline-primary ml-auto"> Page Suivante &raquo;</a>
        <?php endif ?> 
   </div>
</div>


    
