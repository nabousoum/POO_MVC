<div class="container mt-5">
    <h1>Liste des Classes</h1><br>
    <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-classe"?>">
        <button type="button" class="btn btn-primary">AJOUTER UNE CLASSE</button>
    </a>
    <br><br>
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
                <div>
                        <div class="btn">
                            <a href="<?=$Constantes::WEB_ROOT."edit-classe/id=$value->id"?>"
                            <button type="button" class="btn btn-warning">Modifier</button>
                            </a>
                        </div>
                        <form class="btn" action="<?=$Constantes::WEB_ROOT."delete-classe"?>" method="post">
                            <input type="hidden" name="id" value="<?=$value->id?>">
                            
                                <button type="submit" onclick='return deleteModal()' class="btn btn-danger">Supprimer</button>
                           
                        </form>
                    </div>                   
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
   <div class="d-flex justify-content-between my-4">
        <?php if ($currentPage > 1): ?>
            <a href="<?=$Constantes::WEB_ROOT."classes"?>/?page=<?= $currentPage - 1 ?>" class="btn btn-outline-primary">&laquo; Page Precedente</a>
        <?php endif ?> 
        
        <?php if ($currentPage < $pages ): ?>
            <a href="<?=$Constantes::WEB_ROOT."classes"?>/?page=<?= $currentPage + 1 ?>" class="btn btn-outline-primary ml-auto"> Page Suivante &raquo;</a>
        <?php endif ?> 
   </div>
</div>



<script>
    function deleteModal(){
        return confirm ('etes vous sur de vouloir supprimer');
    }
</script>