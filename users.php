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
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required/>
        <input type="email" name="email" placeholder="Email" required/>
        <input type="password" name="senha" placeholder="Senha" required/>
        <input type="password" name="confsenha" placeholder="Confirmar Senha" required/>
        <button class="login--btn">Cadastrar</button>
    </form>
</div>
<script src="https://kit.fontawesome.com/ca98a592e1.js" crossorigin="anonymous"></script>
<script src="assets/leaflet/leaflet.js"></script>
<script src="assets/js/script.js"></script>
<?php
    if(!empty($_POST['email']) && !empty($_POST['senha'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes(md5($_POST['senha']));
        $confsenha = addslashes(md5($_POST['confsenha']));

        if($senha == $confsenha) {
            if($system->createUser($nome, $email, $senha)) {
            ?>
                <script>alertBox('success', 'Cadastrado com sucesso');</script>
            <?php
            } else { 
    ?>
                <script>alertBox('danger', 'Email ja cadastrado em nosso sistema');</script>
    <?php
            }
        } else {

        }
    }
?>
</body>
</html>