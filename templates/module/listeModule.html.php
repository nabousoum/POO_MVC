<div class="container mt-5">
    <h1>Liste des Modules</h1>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Libelle</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($modules as $value) : ?>
            <tr>
                <td><?= $value->id ?></td>
                <td><?= $value->libelle ?></td>
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


    
