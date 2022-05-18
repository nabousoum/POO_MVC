<div class="container mt-5">
    <h1>Liste des Professeurs</h1>
    <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-prof"?>">
        <button type="button" class="btn btn-primary">AJOUTER UN PROFESSEUR</button>
    </a>
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
        <tbody>
        <?php foreach($profs as $value) : ?>
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


    
