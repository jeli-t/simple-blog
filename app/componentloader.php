<?php

    $files = scandir( './component' );

    foreach( $files as $file ) {

        if( $file != '.' && $file != '..' ) {

            require_once( './component/' . $file );

        }

    }

?>