
<div class="container mt-5">
    <h1>Liste des Classes</h1>
    <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-classe"?>">
        <button type="button" class="btn btn-primary">AJOUTER UNE CLASSE</button>
    </a>
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
                       
                            <a href="#myModal" class="trigger-btn" data-toggle="modal">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </a>
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column">					
                                            <h4 class="modal-title w-100">Are you sure?</h4>	
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Etes vous sure de vouloir supprimer la classe <?=$value->libelle?></p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form class="btn" action="<?=$Constantes::WEB_ROOT."delete-classe"?>" method="post">
                                                <input type="hidden" name="id" value="<?=$value->id?>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                    </div>                   
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>

</div>


