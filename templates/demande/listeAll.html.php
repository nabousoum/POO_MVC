
<div class="container mt-5">
<h1>LISTE DES DEMANDES </h1><br>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Nom etudiant</th>
        <th scope="col">Matricule etudiant</th>
        <th scope="col">Classe</th>
        <th scope="col">Demande</th>
        <th scope="col">Etat demande</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($demandes as $value) : ?>
        <tr>
             <td><?= $value->nom_complet ?></td>
            <td><?= $value->matricule ?></td>
            <td><?= $value->libelle ?></td>
            <td><?= $value->libelledemande ?></td>
            <td><?= $value->etat_demande ?></td>
        </tr>
    <?php endforeach?>
    </tbody>
    </table>

</div>


    
