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
            <th scope="col">Année scolaire</th>
            <th scope="col">Action</th>
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
                <td><?= $value->libelle ?></td>
                <td>
                    <a href="<?=$Constantes::WEB_ROOT."add-reinscription/".$Controller::encode("id=$value->id",$Constantes::ENCODE_KEY())?>"
                         <button type="button" class="btn btn-outline-primary">Reinscrire</button>
                    </a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

</div>


    
