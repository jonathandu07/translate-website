<?php
require __DIR__ . './db-connection.php';
require './functions.php';
?>

<!-- (A) SEARCH FORM -->
<form method="post" action="security.php">
    <h1><?php t('Recherche') ?></h1>
    <input type="text" name="search" required />
    <input type="submit" value="Search" />
</form>

<?php
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
    // (B1) SEARCH FOR USERS
    require "db-connection.php";

    // (B2) DISPLAY RESULTS
    //   if (count($results) > 0) { foreach ($results as $r) {
    //     printf("<div>%s - %s</div>", $r["passwords"], $r["sha512_password"]);
    //   }} else { echo t("notFound"); }
    if (count($results) > 0) {
        echo "<h3 class='display'>" . 'Votre mot de passe non sécurisé' . "</h3>";
    }
    else{
        echo t("notFound");
    }
}
?>