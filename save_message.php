<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $messaggio = htmlspecialchars(trim($_POST['messaggio']));
    if(!empty($nome) && !empty($cognome) && filter_var($email,FILTER_VALIDATE_EMAIL) && !empty($messaggio)){
        $file='messaggi.txt';
        $data="Nome: $nome\nCognome: $cognome\nEmail: $email\nMessaggio: $messaggio\n----------------------\n";
        file_put_contents($file,$data,FILE_APPEND|LOCK_EX);
        echo "ok";
    }else{
        echo "errore";
    }
}else{
    header('HTTP/1.1 403 Forbidden');
}
?>
