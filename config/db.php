<?php
// Database connection for LYDRA Care
// Update these with your Hostinger credentials

// Using Hostinger's WordPress database connection
$db_host = '127.0.0.1';      // Usually localhost or 127.0.0.1
$db_name = 'u200709086_yTzUe'; // Your database name
$db_user = 'u200709086_yTzUe'; // Your database user (usually same as db_name on Hostinger)
$db_pass = 'Lydra1234$';               // Your database password (get from Hostinger control panel)

try {
    $pdo = new PDO(
        "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
?>
