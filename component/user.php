<?php

function getUserBlogId( $id ) {

    global $connect;

    $query = 'SELECT `id` FROM `blog` WHERE `id_user` = ' . $id;
    $result = mysqli_query( $connect, $query );
    if( $result ) {
        $row = mysqli_fetch_assoc( $result );
        return $row[ 'id' ];
    } else {
        return 0;
    }

}

function getCurentUserBlogId() { return getUserBlogId( $_SESSION[ 'id' ] ); }


function getAuthor( $id_blog ) {

    global $connect;

    $query = 'SELECT `nick` FROM `user` WHERE `id` = ' . $id_blog + 1;
    $result = mysqli_query( $connect, $query );
    if( $result ) {
        $row = mysqli_fetch_assoc( $result );
        return $row[ 'nick' ];
    } else {
        return 404;
    }

}
?>