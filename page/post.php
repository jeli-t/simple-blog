<div class='content'>

<?php
    $query = 'SELECT * FROM `post` WHERE `id` = ' . $_GET[ 'id' ];
    $result = mysqli_query( $connect, $query );

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $author = getAuthor($row['id_blog']);

            echo('<div class="post" style="margin: 0px 0px; margin-bottom: 100px">');
            echo('<H2>' . $author . '</H2>');
            echo('<div class="preview">');
            echo('<H1>' . $row['title'] . '</H1>');
            echo('<H2>' . $row['short_desc'] . '</H2>');
            echo('</div>');
            echo('</div>');
        }
    }

    $query = 'SELECT * FROM `component` WHERE `id_post` = ' . $_GET[ 'id' ] . ' ORDER BY `order` ASC';
    $result = mysqli_query( $connect, $query );

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            if($row['type'] == 1) {
                echo('<H1>' . $row['content'] . '</H1>');
            } elseif ($row['type'] == 2) {
                echo('<H2>' . $row['content'] . '</H2>');
            } elseif ($row['type'] == 3) {
                echo('<H3>' . $row['content'] . '</H3>');
            } 

        }

    } else {
        redirect(0, '?page=404');
    }

?>

</div>