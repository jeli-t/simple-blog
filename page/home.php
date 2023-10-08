<div class='content'>

<?php
    $query = 'SELECT * FROM `post`';
    $result = mysqli_query( $connect, $query );

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $author = getAuthor($row['id_blog']);
            echo('<H3>Author: ' . $author . '</H3>');
            echo('<H1>Title: ' . $row['title'] . '</H1>');
            echo('<H2>Description: ' . $row['short_desc'] . '</H2>');
        }

    } else {
        echo('<H1>There are no posts yet</H1>');
    }

?>

</div>