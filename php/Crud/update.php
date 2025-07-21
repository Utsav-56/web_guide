/*
    Question: 
        Write a PHP script to update data in a MySQL database named "store" 
        from a table named "products".
        fields of the table are id, name, price, quantity
        update the name of the product with id 1 to "Chamal"
*/

<?php

    define(__CONN, mysqli_connect("localhost", "root", "", "store"));
    if (!__CONN) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE products SET name = 'Chamal' WHERE id = 1";
    $result = mysqli_query(__CONN, $sql);

    if ($result) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error(__CONN);
    }

?>
