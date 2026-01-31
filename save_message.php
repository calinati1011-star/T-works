<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $cognome = htmlspecialchars(trim($_POST['cognome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $messaggio = htmlspecialchars(trim($_POST['messaggio']));

    if (!empty($nome) && !empty($cognome) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($messaggio)) {
        $file = 'messaggi.txt';
        $data = "Nome: $nome\nCognome: $cognome\nEmail: $email\nMessaggio: $messaggio\n----------------------\n";
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
        echo "<script>alert('Messaggio inviato con successo!');window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Compila correttamente tutti i campi!');window.history.back();</script>";
    }
} else {
    header('Location: index.html');
    exit;
}
?>
