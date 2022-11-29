<?php
require __DIR__ . './db-connection.php';
?>

<form action="security.php" method="POST">
    <input type="password" name="password">
    <input type="submit" name="valider">
</form>

<?php

$input = $_POST['password'];
$statement = $pdo->prepare('SELECT ? FROM passwords_list');

$password = ['passwords' => $input];
$statement->bindvalue(1, $password[$input]);
$data = $statement->execute();

$data = $statement->fetchAll();

echo "<br/>";

// print_r($data);
$nb = count($data);
echo "<hr/>";

for ($i = 0; $i < $nb; $i++) {
    echo "<br/>";
    echo "|" . "&nbsp" . $data[$i]['id'] . "&nbsp" . $data[$i]['passwords'] . "&nbsp" . $data[$i]['sha512_password'];
    echo "<hr/>";
}
