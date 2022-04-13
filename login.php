<?php
    session_start();
    include 'class/system.class.php';

    $system = new System();

    if(isset($_SESSION['tracepack'])) {
        header('Location: index.php');
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
</head>
<body class="login">
    <div class="login--form">
        <div class="login--logo">
            <img src="assets/images/logo.png" title="TracerPack" />
        </div>
        <div class="alert"></div>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="senha" placeholder="Senha" required/>
            <button class="login--btn">Acessar</button>
        </form>
    </div>
    <script src="assets/js/script.js"></script>
<?php
    if(!empty($_POST['email']) && !empty($_POST['senha'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes(md5($_POST['senha']));

        if($system->loginUser($email, $senha)) {
            $user = $system->getUser($email);
            $_SESSION['tracepack'] = $user['id'];
            header('Location: index.php');
        } else { 
?>
            <script>alertBox('danger', 'Email ou Senha incorreto');</script>
<?php
        }
    }
?>
</body>
</html>