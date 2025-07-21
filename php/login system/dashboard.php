
<?php
session_start(); // Always start the session first

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Make sure to exit after redirect
}
?>


<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>This is a homepage</h1>
</body>
</html>