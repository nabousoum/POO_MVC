
<div class="container mt-5" >
    <form action="" method="POST" role="form">
        <legend>AJOUT PORFESSEUR</legend>

        <div class="form-group">
            <label for="">Nom Complet</label>
            <input type="text" class="form-control w-60" name="nomComplet" id="" placeholder="Input field">
        </div>
        <div class="form-group">
            <label for="">Sexe
            </label>
            <input type="text" class="form-control w-60" name="sexe" id="" placeholder="Input field">
        </div>
        <div class="form-group">
            <label for="">Grade</label>
            <input type="text" class="form-control w-60" name="grade" id="" placeholder="Input field">
        </div>
        <div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-prof"?>"><button type="button" class="btn btn-success">Voir la liste</button></a>  
        </div>  
    </div>

    </form>

</div>
