
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="<?=$Constantes::WEB_ROOT.'bootstrap/bootstrap.min.css'?>">
</head>
<body>
    <ul class="nav justify-content-end mt-5">
        <li class="nav-item">
            <a class="nav-link" href="<?php  ?>">
                <button type="button" class="btn btn-primary">DECONNEXION</button>
            </a>
        </li>
    </ul>
<?=$contents_for_views?>
<script src="<?=$Constantes::WEB_ROOT.'bootstrap/bootstrap.bundle.min.js'?>"></script>
</body>
</html>