<?php

function addlog( $type = 'success', $message = '' ) {

    echo '<div class="log ' . $type . '">' . $message . '</div>';

}

?>