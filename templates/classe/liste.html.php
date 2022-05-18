<div class="container mt-5">
    <h1>Liste des Classes</h1>
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
                    <i class="fa fa-edit fa-2x blue"></i>
                    <i class="fa fa-trash fa-2x red"></i>
                    <i class="fa-solid fa-circle-info fa-2x green"></i>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

</div>


    
