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

?>