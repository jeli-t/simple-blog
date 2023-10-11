<?php

    $edit = false;

    if( isset( $_SESSION[ 'id' ] ) ) {
        $blog_id = getCurentUserBlogId();

        if( isset( $_GET[ 'id' ] ) ) {
            $query = 'SELECT * FROM `post` WHERE `id` = ' . $_GET[ "id" ] . ' AND `id_blog` = ' . $blog_id ;
            $result = mysqli_query( $connect, $query );

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $author = getAuthor($row['id_blog']);
                $short_desc = $row['short_desc'];
                $edit = true;
                }
            } else {
                addlog( 'error', 'Permission denied' );

?>

<div class="center">
    <h1 style="font-size: 80px;">Simple Blog</h1>
</div>

<?php

            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Iterate through each key-value pair in the $_POST array
                foreach ($_POST as $key => $value) {
                    // Perform any necessary validation or processing here
                    // For demonstration purposes, we are just echoing the key and value
                    echo "$key: $value <br>";
                }
            }

        }

        if( $edit ) {

            echo('<div class="content">');
            echo('<div class="post" style="margin: 0px 0px; margin-bottom: 100px">');
            echo('<H2>' . $author . '</H2>');
            echo('<div class="preview">');
            echo('<H1>' . $title . '</H1>');
            echo('<H2>' . $short_desc . '</H2>');
            echo('</div>');
            echo('</div>');

            $query = 'SELECT * FROM `component` WHERE `id_post` = ' . $_GET[ 'id' ] . ' ORDER BY `order` ASC';
            $result = mysqli_query( $connect, $query );
            $current_component = 1;

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $current_component = $row['order'];
                    echo('<script>var current_component = ' . $current_component . ';</script>');

                    if($row['type'] == 'H1') {
                        echo('<H1>' . $row['content'] . '</H1>');
                    } elseif ($row['type'] == 'H2') {
                        echo('<H2>' . $row['content'] . '</H2>');
                    } elseif ($row['type'] == 'H3') {
                        echo('<H3>' . $row['content'] . '</H3>');
                    } elseif ($row['type'] == 'p') {
                        echo('<p>' . $row['content'] . '</p>');
                    } 

                }
            }

?>

<form action="" method="post">
    <div id="components"></div>
    <div class="new_component" onclick="newComponent()">
        <p>+</p>
    </div>
    <input type="submit" value="Save" name="test">
</form>

<script>
function newComponent() {
    current_component ++;

    var componentForm = document.createElement('div');
    componentForm.className = "component_form";

    var componentType = document.createElement('div');
    componentType.className = 'component_type';

    var typeOption1 = document.createElement('input');
    typeOption1.type = 'radio';
    typeOption1.name = `type${current_component}`;
    typeOption1.value = 'H1';
    componentType.appendChild(typeOption1);

    var typeLabel1 = document.createElement('label');
    typeLabel1.textContent = 'H1';
    componentType.appendChild(typeLabel1);

    var typeOption2 = document.createElement('input');
    typeOption2.type = 'radio';
    typeOption2.name = `type${current_component}`;
    typeOption2.value = 'H2';
    componentType.appendChild(typeOption2);

    var typeLabel2 = document.createElement('label');
    typeLabel2.textContent = 'H2';
    componentType.appendChild(typeLabel2);

    var typeOption3 = document.createElement('input');
    typeOption3.type = 'radio';
    typeOption3.name = `type${current_component}`;
    typeOption3.value = 'H3';
    componentType.appendChild(typeOption3);

    var typeLabel3 = document.createElement('label');
    typeLabel3.textContent = 'H3';
    componentType.appendChild(typeLabel3);

    var typeOption4 = document.createElement('input');
    typeOption4.type = 'radio';
    typeOption4.name = `type${current_component}`;
    typeOption4.value = 'H3';
    componentType.appendChild(typeOption4);

    var typeLabel4 = document.createElement('label');
    typeLabel4.textContent = 'p';
    componentType.appendChild(typeLabel4);

    componentForm.appendChild(componentType);

    var componentContent = document.createElement('textarea');
    componentContent.className = 'component_content';
    componentContent.name = `content${current_component}`;
    componentForm.appendChild(componentContent);

    document.getElementById("components").insertAdjacentElement("beforeend", componentForm);
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