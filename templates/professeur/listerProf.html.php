<div class="container mt-5">
    <h1>Liste des Professeurs</h1>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom complet</th>
        <th scope="col">sexe</th>
        <th scope="col">grade</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $value) : ?>
        <tr>
            <td><?= $value->id ?></td>
            <td><?= $value->nom_complet ?></td>
            <td><?= $value->sexe ?></td> 
            <td><?= $value->grade ?></td> 
        </tr>
        <?php endforeach?>
    </tbody>
    </table>

</div>


    
