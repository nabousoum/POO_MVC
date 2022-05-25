
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
                <input type="text" id="firstName" name="libelle" class="form-control form-control-lg" />
                <?php if(isset($errors)): ?>
                    <small style="color:red"> <?= $errors; ?> </small>
                <?php endif ?><br>
                <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Ajouter" />  <br>  
            </div>
        </div><br>
    </form>
    <form action="<?=$Constantes::WEB_ROOT."liste-module"?>" method="post">
        <select class="form-select" name="filtreModule" aria-label="Default select example">
            <option value="" selected>---Les professeurs disponibles---</option>
            <?php foreach($profs as $value) : ?>
                <option value="<?=$value->id?>"><?=$value->nom_complet?></option>
            <?php endforeach?>
        </select>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
    
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

</div>


    
