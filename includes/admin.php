<?php
include 'db.php';

$password = password_hash('Admin1234', PASSWORD_DEFAULT);

$stmt = $pdo->prepare("UPDATE user SET password = ?, isAdmin = 1 WHERE username = 'Admin2'");
$stmt->execute([$password]);

echo "Admin2 updated";