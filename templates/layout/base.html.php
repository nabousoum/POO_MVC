
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="<?=$Constantes::WEB_ROOT.'css/login.style.css'?>">
    <link rel="stylesheet" href="<?=$Constantes::WEB_ROOT.'bootstrap/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=$Constantes::WEB_ROOT.'bootstrap/bootstrap-select.min.css'?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 135px;" alt="logo">
                </a>
                <?php if($Role::isRP()):?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-module"?>">
                                <i class="fa-solid fa-list"></i>
                                LISTE DES MODULES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."classes"?>">
                                <i class="fa-solid fa-list"></i>
                                LISTE DES CLASSES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-prof"?>">
                                <i class="fa-solid fa-list"></i>
                            LISTE DES PROFESSEURS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-all-demandeR"?>">
                                <i class="fa-solid fa-list"></i>
                            LISTE DES DEMANDES
                            </a>
                        </li>
                    </ul>
                <?php endif?>
                <?php if($Role::isAC()):?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-insc"?>">
                                <i class="fa-solid fa-list"></i>
                                LISTE DES INSCRIPTIONS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-etu"?>">
                                <i class="fa-solid fa-list"></i>
                                LISTE DES ETUDIANTS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-insc    "?>">
                                <i class="fa-solid fa-list"></i>
                                INSCRIRE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-all-demande"?>">
                                <i class="fa-solid fa-list"></i>
                                LISTE DES DEMANDES
                            </a>
                        </li>
                        
                    </ul>
                <?php endif?>
                <?php if($Role::isEtudiant()):?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."liste-demande"?>">
                                <i class="fa-solid fa-list"></i>
                                LISTER MES DEMANDES
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$Constantes::WEB_ROOT."add-demande"?>">
                                <i class="fa-solid fa-list"></i>
                                FAIRE UNE DEMANDE 
                            </a>
                        </li>
                        
                    </ul>
                <?php endif?>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a class="nav-link" href="<?=$Constantes::WEB_ROOT."logout"?>">
                    <button type="button" class="btn btn-primary">DECONNEXION</button>
                </a>
            </div>
            <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->


<?=$contents_for_views?>
<script src="<?=$Constantes::WEB_ROOT.'bootstrap/jquery.min.js'?>"></script>
<script src="<?=$Constantes::WEB_ROOT.'bootstrap/bootstrap.bundle.min.js'?>"></script>
<script src="<?=$Constantes::WEB_ROOT.'bootstrap/bootstrap-select.min.js'?>"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>