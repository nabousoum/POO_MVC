
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
                <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Ajouter" />  
            </div>
        </div>
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
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($modules as $value) : ?>
            <tr>
                <td><?= $value->id ?></td>
                <td><?= $value->libelle ?></td>
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


    
