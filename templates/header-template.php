<?php
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/Disc-ing/";
include_once('../config/db.php');

if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['loginStatus']))
    header("Location: " . $BASE_URL . "paginasPrincipais/login.php");

$stmt = $conn->prepare("SELECT banido FROM usuario WHERE usuarioID = :usuarioID");
$stmt->execute([':usuarioID' => $_SESSION['usuarioID']]);
$_SESSION['banido'] = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['banido'] = $_SESSION['banido']['banido'];

if ($_SESSION['banido'])
    header("Location: " . $BASE_URL . "paginasPrincipais/bannedUser.php");
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body <?php
        if (isset($bodyAttributes))
        echo $bodyAttributes;
        ?>>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= $BASE_URL ?>paginasPrincipais/index.php">
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
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link <?php echo $active == 'home' ? 'active" aria-current="page"' : '"'; ?> href="<?= $BASE_URL ?>paginasPrincipais/index.php">Home</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link <?php echo $active == 'sobre' ? 'active" aria-current="page"' : '"'; ?> href="<?= $BASE_URL ?>paginasPrincipais/sobre.php">Sobre</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link <?php echo $active == 'perfil' ? 'active" aria-current="page"' : '"'; ?> href="<?= $BASE_URL ?>paginasPrincipais/perfilDoUsuario.php?u=<?= $_SESSION['usuarioID'] ?>">Perfil</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a href="<?= $BASE_URL ?>form/logout.php" class="nav-link"><button id="logoutBtn" class="btn btn-outline-light">Log-out</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>