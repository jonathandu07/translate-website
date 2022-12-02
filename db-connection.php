<?php
// (A) DATABASE CONFIG - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "passwords");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "jonathandu07");

// (B) CONNECT TO DATABASE
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (Exception $ex) {
    exit($ex->getMessage());
}

// (C) SEARCH
// $stmt = $pdo->prepare("SELECT * FROM `passwords_list` WHERE `passwords` LIKE ? OR `sha512_password` LIKE ?");
// $stmt->execute(["%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%"]);
// $results = $stmt->fetchAll();
// if (isset($_POST["ajax"])) {
//     echo json_encode($results);
// }

$check_password = $pdo->query("SELECT= * FROM passwords_list WHERE passwords LIKE ? ");
$check_password -> execute(["%" . $_POST["search"] . "%"]);
if ($check_password) {
    echo "Mot de passe non sécurisé";
}