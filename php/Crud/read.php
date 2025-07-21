/*
    Question: 
        Write a PHP script to read data from a MySQL database named "store" 
        from a table named "products" and display it in an HTML table.

        fields of the table are id, name, price, quantity
        
*/


<?php

define(__CONN, mysqli_connect("localhost", "root", "", "store"));

if (!__CONN) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';
$tableCode = "";

$result = mysqli_query(__CONN, "SELECT * FROM products");

if ($result) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error(__CONN);
}

// using loop to get data
foreach ($products as $product) {
    $tableCode .= <<<HTML
    <tr>
        <td>{$product['id']}</td>
        <td>{$product['name']}</td>
        <td>{$product['price']}</td>
        <td>{$product['quantity']}</td>
    </tr>
    HTML;
}

?>



<html>
    <head>
        <title>Product List</title> 
    </head>
    <body>
        <h2>Product List</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php echo $tableCode; ?>
        </table>
    </body>
</html>