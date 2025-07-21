 <?php


// Creating a global variable constant for database connection
// It is same as doing $conn = mysqli_connect() 
// but using a define allows us to use it inside other functions.
define('__CONN', mysqli_connect("localhost", "root", "", "store"));

if (!__CONN) {
    die("Connection failed: " . mysqli_connect_error());
}

// to store message to display in  the HTML
$message = '';

function main()
{
    if (!isset($_POST['submit'])) {
        return "";
    }

    // Check if all required fields are present
    if (!isset(!isset($_POST['email']) || !isset($_POST['password'])) {
        return "All fields are required.";
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    
    // Check if username exists
    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $result = mysqli_query(__CONN, $sql);

if (mysqli_num_rows($result) <= 0) {
        return "Invalid username or email or password.";
    }

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header("Location: homepage.php");
    exit();

    return "Login successful.";

}

$message = main();

?>

<html>
<head>
    <title>Login New User</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="submit" value="Login">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>