<?php

function redirect( $time = 2, $url = '?' ) {
    header( 'refresh:' . $time . ';url=' . $url );
}

?>