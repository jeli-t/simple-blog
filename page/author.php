<div class='content'>

<?php
    $query = 'SELECT * FROM `post` WHERE `id_blog` = ' . $_GET[ 'id' ] . ' ORDER BY `add_at` DESC';
    $result = mysqli_query( $connect, $query );

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $author = getAuthor($row['id_blog']);

            echo('<div class="post">');
            echo('<a href="?page=author&id=' . $row['id_blog'] . '">');
            echo('<H2>' . $author . '</H2>');
            echo('</a>');
            echo('<div class="preview">');
            echo('<a href="?page=post&id=' . $row['id'] . '">');
            echo('<H1>' . $row['title'] . '</H1>');
            echo('<H2>' . $row['short_desc'] . '</H2>');
            echo('</a>');
            echo('</div>');
            echo('</div>');
            echo('</a>');

        }

    } else {
        echo('<H1>There are no posts yet</H1>');
    }

?>

</div>