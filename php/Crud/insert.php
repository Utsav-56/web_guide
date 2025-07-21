<?php

define('__CONN', mysqli_connect("localhost", "root", "", "store"));

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
    if (!isset($_POST['Name']) || !isset($_POST['age']) || !isset($_POST['phone'])) {
        return "All fields are required.";
    }

    // Get the form data
    $name = trim($_POST['Name']);
    $age = trim($_POST['age']);
    $phone = trim($_POST['phone']);

    // Validate phone number (must be exactly 10 digits)
    if (strlen($phone) != 10) {
        return "Phone number must be exactly 10 digits.";
    }

    // Insert into database
    $sql = "INSERT INTO users (name, age, phone) VALUES ('$name', '$age', '$phone')";
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
    <label>Name:</label>
    <input type="text" name="Name" required><br>

    <label>Age:</label>
    <input type="number" name="age" required><br>

    <label>Phone number:</label>
    <input type="text" name="phone" required><br>

    <button type="submit" name="submit">Register</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
