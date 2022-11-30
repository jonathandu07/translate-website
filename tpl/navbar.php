<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="site-header"><a href="<?php echo base_url(); ?>"><?php echo c("Traduire"); ?></a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home"><?php echo c("Accueil"); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact"><?php echo c("Contact"); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mentions-legales"><?php echo c("Mentions"); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="security"><?php echo c("Securite"); ?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo c("Langue"); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?lang=fr">Français</a>
                    <a class="dropdown-item" href="?lang=en">English</a>
                </div>
            </li>
        </ul>
    </div>
</nav>