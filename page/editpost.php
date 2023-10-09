<?php

    if( isset( $_SESSION[ 'id' ] ) ) {
        $form = false;
        $blog_id = getCurentUserBlogId();

        if( isset( $_GET[ 'id' ] ) ) {
            $query = 'SELECT `title` FROM `post` WHERE `id` = ' . $_GET[ "id" ] . ' AND `id_blog` = ' . $blog_id ;
            $result = mysqli_query( $connect, $query );

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $form = true;
                }
            } else {
                addlog( 'error', 'Permission denied' );
            }

        }

        if( $form ) {

            echo('<div class="content">');
            echo('<H1>Title: </H1>');
            echo('<H2>' . $title . '</H2>');
            echo('</div>');

        }
    } else {
        addlog( 'warning', 'Only for loged users!' );
        redirect(2, '?page=login');

?>

<div class="center">
    <h1 style="font-size: 80px;">Simple Blog</h1>
</div>

<?php

    }

?>