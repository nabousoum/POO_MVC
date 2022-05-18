
<div class="container mt-5">
    <h1>Liste des etudiants inscrits</h1>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Nom complet</th>
        <th scope="col">Matricule</th>
        <th scope="col">Sexe</th>
        <th scope="col">Classe</th>
        <th scope="col">Annee scolaire</th>
        <th scope="col">Etat inscription</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($inscriptions as $value) : ?>
        <tr>
            <td><?= $value->nom_complet ?></td>
            <td><?= $value->matricule ?></td>
            <td><?= $value->sexe ?></td>
            <td><?= $value->libelleClasse ?></td>
            <td><?= $value->libelle ?></td>
            <td><?= $value->etat_ins ?></td>
        </tr>
        <?php endforeach?>
    </tbody>
    </table>

</div>


    
