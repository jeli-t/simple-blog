<?php

    if( isset( $_SESSION[ 'id' ] ) ) {
        $form = false;
        $blog_id = getCurentUserBlogId();

        if( isset( $_GET[ 'id' ] ) ) {
            $query = 'SELECT * FROM `post` WHERE `id` = ' . $_GET[ "id" ] . ' AND `id_blog` = ' . $blog_id ;
            $result = mysqli_query( $connect, $query );

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $author = getAuthor($row['id_blog']);
                $short_desc = $row['short_desc'];
                $form = true;
                }
            } else {
                addlog( 'error', 'Permission denied' );

?>

<div class="center">
    <h1 style="font-size: 80px;">Simple Blog</h1>
</div>

<?php

            }

        }

        if( $form ) {

            echo('<div class="content">');
            echo('<div class="post" style="margin: 0px 0px; margin-bottom: 100px">');
            echo('<H2>' . $author . '</H2>');
            echo('<div class="preview">');
            echo('<H1>' . $title . '</H1>');
            echo('<H2>' . $short_desc . '</H2>');
            echo('</div>');
            echo('</div>');

?>

<div id="components"></div>
<div class="new_component" onclick="newComponent()">
    <p>+</p>
</div>
</div>

<script>
function newComponent() {
    document.getElementById("components").insertAdjacentHTML("beforeend", "<div class='component_form'>Here will be form</div>");
}
</script>

<?php

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
</div>