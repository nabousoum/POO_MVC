
<div class="container mt-5">
    <h1>BIENVENUE <?= $_SESSION['user']->nom_complet ?></h1><br>
    <form action="<?=$Constantes::WEB_ROOT."liste-demande"?>" method="post">
    <div class="row">
        <div class="col">
            <select class="form-select w-100" name="filtreEtat" aria-label="Default select example">
                <option value="" selected>---Filtre par etat des demandes---</option>
                <option value="en cours">EN COURS</option>
                <option value="annule">ANNULER</option>
                <option value="valide">VALIDER</option>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>    
    </form><br><br>
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


    
