<?php
    session_start();
    $usuario = $_POST['usuario'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);
    $user = 'root';
    $pass = '';
    $banco = 'login';
    $servidor = 'localhost';
    $connect = mysqli_connect($servidor,$user,$pass);
    $db = mysqli_select_db($connect, $banco);
    
    //$usuario = mysqli_real_escape_string($connect, $_POST['usuario'])
    


    if (isset($entrar)) {
        $verifica = mysqli_query($connect, "SELECT * FROM usuarios WHERE usuario =
        '$usuario' AND senha = '$senha'") or die("erro ao selecionar");
        
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.html';</script>";
            die();
        }else{
            $_SESSION['usuario'] = $usuario;
            header("Location:index.php");
        }
    }
?>