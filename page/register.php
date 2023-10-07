<?php

    if( !isset( $_SESSION[ 'id' ] ) ) {

    $form = true;

    if( isset( $_POST[ 'test' ] ) ) {

        if(
                isset( $_POST[ 'nick' ] ) && !empty( $_POST[ 'nick' ] ) &&
                isset( $_POST[ 'pass' ] ) && !empty( $_POST[ 'pass' ] ) &&
                isset( $_POST[ 'pass_conf' ] ) && !empty( $_POST[ 'pass_conf' ] )
            ) {
                
                if( $_POST[ 'pass'] === $_POST[ 'pass_conf' ] ) {

                    $query = 'SELECT `id` FROM `user` WHERE `nick` = "' . $_POST[ 'nick' ] . '"';
                    $result = mysqli_query( $connect, $query );
                    if( mysqli_num_rows( $result ) ) {
                        addlog( 'warning', 'Username ' . $_POST[ 'nick' ] . ' already exists!' );
                    } else {
                        
                        $query = 'INSERT INTO `user` VALUES ( NULL, "' . $_POST[ 'nick' ] . '", "' . sha1( md5( $_POST[ 'pass' ] ) ) . '", 1 )';
                        $result = mysqli_query( $connect, $query );

                        $form = false;

                        if( $result ) {
                            addlog( 'success', 'New user registered.' );

                            $query = 'INSERT INTO `blog` ( `id_user` ) VALUES ( ' . mysqli_insert_id( $connect ) . ' )';
                            $result = mysqli_query( $connect, $query );

                            if( $result ) {
                                addlog( 'success', 'New blog created.' );
                            } else {
                                addlog( 'error', 'Failed to create new blog!' );
                            }

                        } else {
                            addlog( 'error', 'Failed to register!' );
                        }

                    }

                } else {
                    addlog( 'warning', 'Passwords does not match!' );
                }

            } else {
                addlog( 'warning', 'Fill all the inputs!' );
            }

        }


        if( $form ) {
?>

<div class="center">
    <H1>Welcome to Simple Blog!</H1>
    <H2>Register your new account</H2>
    <form action="" method="post" class="register">
        <label>Username:</label><input type="text" name="nick"><br>
        <label>Password:</label><input type="password" name="pass"><br>
        <label>Repeat password:</label><input type="password" name="pass_conf"><br>
        <input type="submit" value="Register" name="test">
    </form>
    <H3>Already have an account?</H3>
    <a href="?page=login" class='link'>Login here</a>
</div>

<?php

        }
        
    } else {
        addlog( 'warning', 'You are logged in!' );
    }

?>