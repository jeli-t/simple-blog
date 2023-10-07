<div class="center" style="background-color: var(--primary3)">
    <h1 style="font-size: 80px; color: var(--primary1)">Simple Blog</h1>
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