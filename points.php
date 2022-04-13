<?php
    session_start();
    include 'class/system.class.php';

    $system = new System();

    if(!isset($_SESSION['tracepack'])) {
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TracerPack</title>
    
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="assets/leaflet/leaflet.css" />
</head>
<body>
<nav>
    <div class="menu">
        <div id="menu-opener" onclick="openMenu()">
            <i class="fas fa-bars"></i>
        </div>
        <div id="menu-area">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="users.php">Usuários</a></li>
                <li><a href="points.php">Pontos</a></li>
                <li><a href="poligonos.php">Polígonos</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="login--form">
    <div class="alert"></div>
    <h2>Cadastrar Pontos</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required/>
        <input type="text" name="latitude" placeholder="Latitude" required/>
        <input type="text" name="longitude" placeholder="Longitude" required/>
        <button class="login--btn">Cadastrar</button>
    </form>
</div>
<script src="https://kit.fontawesome.com/ca98a592e1.js" crossorigin="anonymous"></script>
<script src="assets/leaflet/leaflet.js"></script>
<script src="assets/js/script.js"></script>
<?php
    if(!empty($_POST['nome']) && !empty($_POST['latitude'])) {
        $nome = addslashes($_POST['nome']);
        $latitude = addslashes($_POST['latitude']);
        $longitude = addslashes($_POST['longitude']);

        if($system->createPoint($nome, $latitude, $longitude)) {
        ?>
            <script>alertBox('success', 'Cadastrado com sucesso');</script>
        <?php
        }
    }
?>
</body>
</html>