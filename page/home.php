<div class='content'>

<?php
    $query = 'SELECT * FROM `post` ORDER BY `add_at` DESC';
    $result = mysqli_query( $connect, $query );

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $author = getAuthor($row['id_blog']);

            echo('<div class="post">');
            echo('<H2>' . $author . '</H2>');
            echo('<div class="preview">');
            echo('<H1>' . $row['title'] . '</H1>');
            echo('<H2>' . $row['short_desc'] . '</H2>');
            echo('</div>');
            echo('</div>');

        }

    } else {
        echo('<H1>There are no posts yet</H1>');
    }

?>

</div>