<?php
$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . "/Disc-ing_2.0/";
include_once("../config/db.php");

$aditionalTags = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">';
include_once('../templates/header-template.php');

$stmt = $conn->prepare("SELECT * FROM jogo");
$stmt->execute();
$Jogos = $stmt->fetchAll();

// if (usuario não logado)
//header("Location: " . $BASE_URL . "paginasPrincipais/login.php");
?>

    <main id="indexmain" class="d-flex justify-content-center">
        <section class="sectionJogosPopulares container">
            <form action="gamePage.php">
                <div class="titleContainer">
                    <h1>Jogos Populares</h1>
                </div>
                <div class="jogosPopContainer container-fluid d-flex flex-column align-items-center justify-content-center">
                    <div class="col-12 d-flex align-items-center swiper">
                        <div class="cardWrapper">
                            <input id="gamePageHeader" type="hidden" name="gameID" value="">
                            <ul class="cardList  d-flex align-items-center swiper-wrapper">

                                <?php

                                foreach ($Jogos as $Jogo) {
                                    $stmt = $conn->prepare("SELECT SUM(nota) AS nota, COUNT(*) AS nAvaliacoes FROM avaliacao WHERE jogoID = :jogoID");
                                    $stmt->execute([':jogoID' => $Jogo['id']]);
                                    $cardScore = $stmt->fetch();

                                    if ($cardScore['nAvaliacoes'] > 0)
                                        $cardScore = number_format($cardScore['nota'] / $cardScore['nAvaliacoes'], 2);
                                    else
                                        $cardScore = number_format(0, 2);

                                    echo '
                                        <li class="cardItem swiper-slide">
                                            <button class="cardLink" onclick="document.getElementById('."'gamePageHeader'".').value = '. $Jogo['id'] .'">
                                                <img class="cardImg w-100" src="../assets/Jogos/banner' . $Jogo['id'] . '.jpg" alt="Capa ' . $Jogo['nome'] . '">
                                                <div class="cardTitleContainer d-flex justify-content-between align-items-end">
                                                    <h2 class="cardTitle">' . $Jogo['nome'] . '</h2>
                                                    <img class="cardClassificacao" alt="Classificação ' . $Jogo['classificacao'] . ' anos" src="' . $BASE_URL . 'assets/Jogos/classificacao/age' . $Jogo['classificacao'] . '.png">
                                                </div>
                                                <div class="cardScoreContainer">
                                                    <span class="cardScore d-flex align-items-center gap-2"><i class="bi bi-star-fill"></i> '. $cardScore .'</span>
                                                </div>
                                            </button>
                                        </li> 
                                    ';
                                }

                                ?>

                            </ul>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="../javascript/index.js"></script>
<?php
include_once('../templates/footer-template.php');
?>