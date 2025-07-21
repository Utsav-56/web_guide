<?php
session_start();

if ($_POST['username'] === 'admin' && $_POST['password'] === 'secret') {
    $_SESSION['username'] = 'admin';
    header("Location: home.php");
    exit();
}
?>

<form method="post">
  <input name="username" placeholder="Username" required>
  <input name="password" type="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>
