<?php
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/Disc-ing_2.0/";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?php
        if (isset($title))
            echo $title;
        else
            echo 'Disc-ing';
    ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php  
    if (isset($aditionalTags))
        echo $aditionalTags;
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="icon" type="image/x-icon" href="<?= $BASE_URL ?>assets/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= $BASE_URL ?>css/style.css">
</head>

<body <?php
        if (isset($bodyAttributes))
        echo $bodyAttributes;
        ?>>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= $BASE_URL ?>assets/LogoDisc-ing.png" alt="Logo Disc-ing" class="d-inline-block w-100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent"
                    aria-expanded="false" aria-label="Esconder a navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="ms-auto">
                        <ul class="navbar-nav ml-auto mb-2 mb-lh-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= $BASE_URL ?>paginasPrincipais/index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $BASE_URL ?>paginasPrincipais/sobre.php">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $BASE_URL ?>paginasPrincipais/perfilDoUsuario.php">Perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="headerShadow"></div>
    </header>