/*

    Question: 
        Write a PHP script to delete data in a MySQL database named "store" 
        from a table named "products" with id 9.
*/

<?php
    define('__CONN', mysqli_connect("localhost", "root", "", "store"));
    if (!__CONN) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "DELETE FROM products WHERE id = 9";
    $result = mysqli_query(__CONN, $sql);
  
    if ($result) {
        echo "Data deleted successfully!";
    } else {
        echo "Error deleting data: " . mysqli_error(__CONN);
    }
?>