<?php
$password = "Tironcalina1"; 
if ($_POST['pass'] ?? '' === $password) {
    $file = 'messaggi.txt';
    if(file_exists($file)) {
        echo nl2br(file_get_contents($file));
    } else {
        echo "Nessun messaggio.";
    }
} else {
    echo '<form method="POST">
        Password: <input type="password" name="pass">
        <button type="submit">Accedi</button>
    </form>';
}
?>