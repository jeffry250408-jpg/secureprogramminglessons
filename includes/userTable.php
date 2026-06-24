<?php
// Controleer of de 'user' tabel al bestaat
$checkTable = $pdo->query("SHOW TABLES LIKE 'user'");
if ($checkTable->rowCount() == 0) {
    // Maak de 'user' tabel als deze nog niet bestaat
   $pdo->exec("CREATE TABLE `user` (
        `id` int NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL,
        `password` varchar(255) NOT NULL,
        `balance` decimal(10,2) NOT NULL,
        `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci");

    // Voeg de standaardgebruikers toe
   
     $adminPassword = password_hash('AlfaBankAdminAccount', PASSWORD_DEFAULT);
    $ferryPassword = password_hash('12345678', PASSWORD_DEFAULT);
    $hanPassword = password_hash('password', PASSWORD_DEFAULT);
    $royPassword = password_hash('qwerty', PASSWORD_DEFAULT);

    // Voer de SQL-query uit om de gebruikers toe te voegen
   $stmt = $pdo->prepare("
    INSERT INTO `user` (`id`, `username`, `password`, `balance`, `isAdmin`)
    VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([1, 'Admin', $adminPassword, 1000.00, 0]);
    $stmt->execute([2, 'FerryKuhlman', $ferryPassword, 1255.36, 0]);
    $stmt->execute([5, 'Han2002', $hanPassword, 23424.84, 0]);
    $stmt->execute([6, 'RoyBos', $royPassword, 9.23, 0]);
}
?>
}