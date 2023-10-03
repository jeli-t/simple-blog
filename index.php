<?php

    // uruchomienie mechanizmu sesji
    session_start();

    require_once( './app/config.php' );

    require_once( './app/db.php' );

    require_once( './app/componentloader.php' );

    require_once( './template/header.php' );

    require_once( './app/router.php' );

    require_once( './template/footer.php' );

?>