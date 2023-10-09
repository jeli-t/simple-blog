<h1>Add new post</h1>

<?php

    if( isset( $_SESSION[ 'id' ] ) ) {

        $form = true;

        if( isset( $_POST[ 'test' ] ) ) {

            if( isset( $_POST[ 'title' ] ) && !empty( $_POST[ 'title' ] ) ) {

                $short_desc = ( isset( $_POST[ 'short_desc' ] ) ) ? $_POST[ 'short_desc' ] : '';

                $query = 'INSERT INTO `post` ( `id_blog`, `title`, `short_desc` ) VALUES ( ' . getCurentUserBlogId() . ', "' . $_POST[ 'title' ] . '", "' . $short_desc . '" )';
                $result = mysqli_query( $connect, $query );
                if( $result ) {
                    addlog( 'success', 'New post created. Redirecting to editing page.' );
                    redirect( 3, '?page=editpost&id=' . mysqli_insert_id( $connect ) );
                    $form = false;
                } else {
                    addlog( 'error', 'Failed to add new post!' );
                }

            } else {
                addlog( 'warning', 'Title required' );
            }

        }

        if( $form ) {
?>

<form action="" method="post">
    <label>Title: </label><input type="text" name="title" maxlength="100" require><br>
    <label>Description:</label><textarea name="short_desc" maxlength="500"></textarea><br>
    <input type="submit" value="Add post" name="test">
</form>

<?php
        }

    } else {
        addlog( 'warning', 'Only for loged users!' );
    }

?>