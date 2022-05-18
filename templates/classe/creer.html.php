
<div class="container mt-5" >
    <form action="" method="POST" role="form">
        <legend>AJOUT CLASSE</legend>

        <div class="form-group">
            <label for="">Libelle</label>
            <input type="text" class="form-control w-60" name="libelle" id="" placeholder="Input field">
        </div>
        <div class="form-group">
            <label for="">Filiere</label>
            <input type="text" class="form-control w-60" name="filiere" id="" placeholder="Input field">
        </div>
        <div class="form-group">
            <label for="">Niveau</label>
            <input type="text" class="form-control w-60" name="niveau" id="" placeholder="Input field">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."classes"?>"><button type="button" class="btn btn-success">Voir la liste</button></a>  
        </div>
      
    </form>

</div>
