<?php

    $page = 'home';

    if( isset( $_GET[ 'page' ] ) ) {

        if( file_exists( './page/' . $_GET[ 'page' ] . '.php' ) ) {

            $page = $_GET[ 'page' ];

        } else $page = 404;

    }

    require_once( './page/' . $page .'.php' );

?>