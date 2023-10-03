<?php

function redirect( $time = 3, $url = '?' ) {
    header( 'refresh:' . $time . ';url=' . $url );
}

?>