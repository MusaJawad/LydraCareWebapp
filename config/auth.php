<?php
// Session and authentication helper
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

function getCurrentUserEmail() {
    return $_SESSION['user_email'] ?? null;
}

function getCurrentUserName() {
    return $_SESSION['user_name'] ?? null;
}

function getCurrentSeniorId() {
    return $_SESSION['senior_id'] ?? null;
}

function logout() {
    session_destroy();
    header('Location: login.php');
    exit;
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}
?>
