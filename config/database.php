<?php


$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'HospitalAppointment';


$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8");

// Function to execute prepared statements
function executeQuery($conn, $sql, $types, $params) {
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        mysqli_stmt_execute($stmt);
        return $stmt;
    }
    return false;
}

// Function to get result as associative array
function getResult($stmt) {
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>