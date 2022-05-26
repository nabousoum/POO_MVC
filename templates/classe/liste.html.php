
<div class="container mt-5">
    <h1>Liste des Classes</h1>
    <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-classe"?>">
        <button type="button" class="btn btn-primary">AJOUTER UNE CLASSE</button>
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Libelle</th>
            <th scope="col">Filiere</th>
            <th scope="col">Niveau</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($classes as $value) : ?>
            <tr>
                <td><?= $value->libelle ?></td>
                <td><?= $value->filiere ?></td>
                <td><?= $value->niveau ?></td> 
                <td>
                    <div>
                    <a href="<?=$Constantes::WEB_ROOT."edit-classe/id=$value->id"?>"
                    <button type="button" class="btn btn-outline-warning">Modifier</button>
                    </a>
                    <form action="<?=$Constantes::WEB_ROOT."delete-classe"?>" method="post">
                        <input type="hidden" name="id" value="<?=$value->id?>">
                        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                    </form>

                    </div>
                   
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

</div>


    
