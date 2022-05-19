<div class="container mt-5">
    <h1>Liste des Etudiants</h1>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom complet</th>
            <th scope="col">Sexe</th>
            <th scope="col">Matricule</th>
            <th scope="col">Adresse</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($etudiants as $value) : ?>
            <tr>
                <td><?= $value->id ?></td>
                <td><?= $value->nom_complet ?></td>
                <td><?= $value->sexe ?></td> 
                <td><?= $value->matricule ?></td>
                <td><?= $value->adresse ?></td>
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


    
