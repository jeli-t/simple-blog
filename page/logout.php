<div class="center">
    <h1 style="font-size: 80px;">Simple Blog</h1>
</div>

<?php

    if( isset( $_SESSION[ 'id' ] ) ) {
        unset( $_SESSION[ 'id' ] );
        addlog( 'success', 'Logged out!' );
        redirect();
    } else {
        redirect(0);
    }

?>