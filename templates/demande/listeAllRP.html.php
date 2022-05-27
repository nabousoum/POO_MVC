
<div class="container mt-5">
    <h3>Les demandes en cours</h3>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Nom etudiant</th>
        <th scope="col">Matricule etudiant</th>
        <th scope="col">Classe</th>
        <th scope="col">Demande</th>
        <th scope="col">Etat demande</th>
        <th scope="col">Actions</th>
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
            <td>
                <button type="button" class="btn btn-outline-success">Valider</button>
                <form class="btn" action="<?=$Constantes::WEB_ROOT."liste-all-demandeR"?>" method="post">
                    <input type="hidden" name="id" value="<?=$value->id?>">
                    <button type="submit" class="btn btn-outline-danger">Annuler</button>
                </form>
               
            </td>
        </tr>
    <?php endforeach?>
    </tbody>
    </table>
    <br>
<h2>Les demandes validées</h2>
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
    <?php foreach($demandesValide as $value) : ?>
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
    <br>
    <h2>Les demandes annulées</h2>
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
    <?php foreach($demandesAnnule as $value) : ?>
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



