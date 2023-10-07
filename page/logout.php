<?php

    if( isset( $_SESSION[ 'id' ] ) ) {
        unset( $_SESSION[ 'id' ] );
        addlog( 'success', 'Logged out!' );
        redirect();
    } else {
        addlog( 'warning', 'You are not loged in!' );
    }

?>