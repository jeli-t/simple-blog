<?php

    if( !isset( $_SESSION[ 'id' ] ) ) {

        $form = true;

        if( isset( $_POST[ 'test' ] ) ) {
            
            if(
                isset( $_POST[ 'nick' ] ) && !empty( $_POST[ 'nick' ] ) &&
                isset( $_POST[ 'pass' ] ) && !empty( $_POST[ 'pass' ] )
            ) {
                
                $query = 'SELECT `id` FROM `user` WHERE `nick` = "' . $_POST[ 'nick' ] . '" AND `password` = "' . sha1( md5( $_POST[ 'pass' ] ) ) . '"';
                $result = mysqli_query( $connect, $query );

                if( $result ) {

                    if( mysqli_num_rows( $result ) ) {
                        $row = mysqli_fetch_assoc( $result );
                        $_SESSION[ 'id' ] = $row[ 'id' ];
                        addlog( 'success', 'User logged in' );
                        redirect();
                        $form = false;
                    } else {
                        addlog( 'warning', 'Incorrect credentials' );
                    }

                } else {
                    addlog( 'error', 'Connection failed' );
                }

            } else {
                addlog( 'warning', 'Fill all the inputs!' );
            }

        }

        if( $form ) {

?>

<div class='center'>
    <H1>Welcome to Simple Blog!</H1>
    <H2>Please login to your account</H2>
    <form action="" method="post" class="login">
        <label>Username:</label>
        <input type="text" name="nick">
        <label>Password:</label>
        <input type="password" name="pass">
        <input type="submit" value="Login" name="test">
    </form>
    <H3>Don't have an account yet?</H3>
    <a href="?page=register" class="link">Register here</a>
</div>

<?php

        }

    } else {
        redirect(0);
        addlog( 'warning', 'You are already logged in!' );
    }

?>