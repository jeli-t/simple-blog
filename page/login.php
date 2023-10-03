<h1>Login</h1>

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

<form action="" method="post">
    <label>Username</label><input type="text" name="nick"><br>
    <label>Password:</label><input type="password" name="pass"><br>
    <input type="submit" value="Login" name="test">
</form>

<?php

        }

    } else {
        addlog( 'warning', 'You are already logged in!' );
    }

?>