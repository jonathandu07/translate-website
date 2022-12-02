<h1><?php echo c('Contact'); ?></h1>
<p><?php echo c('contactinfo'); ?></p>
<img src='https://cdn-icons-png.flaticon.com/512/3815/3815596.png' alt='form'></img>
<article>
    <form action="form.php" method="GET">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom">
        </div>

    </form>
</article>