
<div class="container mt-5">
    <h1>BIENVENUE <?= $_SESSION['user']->nom_complet ?></h1>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Libelle demande</th>
        <th scope="col">Etat demande</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($demandes as $value) : ?>
        <tr>
             <td><?= $value->libelle ?></td>
            <td><?= $value->etat_demande ?></td>
        </tr>
    <?php endforeach?>
    </tbody>
    </table>

</div>


    
