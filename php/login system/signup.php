<?php


// Creating a global variable constant for database connection
// It is same as doing $conn = mysqli_connect() 
// but using a define allows us to use it inside other functions.
define(__CONN, mysqli_connect("localhost", "root", "", "store"));

if (!__CONN) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';

function main()
{
    if (!isset($_POST['submit'])) {
        return "";
    }

    // Check if all required fields are present
    if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password'])) {
        return "All fields are required.";
    }

    // Get the form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    // Validate password strength
    if (strlen($password) < 6) {
        return "Password must be at least 6 characters long.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query(__CONN, $sql);

    if (mysqli_num_rows($result) > 0) {
        return "Username already exists. Please choose a different one.";
    }

    // Insert into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query(__CONN, $sql);

    if (!$result) {
        return "Error inserting data.";
    }


    return "Data inserted successfully!";
}

$message = main();
?>

<!DOCTYPE html>
<html>
<head><title>Signup</title></head>
<body>

<h2>Signup</h2>

<form method="post" action="">
  <label>Username:</label>
    <input type="text" name="username" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit" name="submit">Register</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
