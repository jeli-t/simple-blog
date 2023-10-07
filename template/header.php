<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/logs.css">
</head>
<body>
    <nav class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <a href="?" class="nav-title" style="text-decoration: none;">
                Simple Blog
            </a>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-links">
            <a href="?">Home page</a>
            <?php if( !isset( $_SESSION[ 'id' ] ) ) { ?>
                <a href="?page=login">Login</a>
                <a href="?page=register">Register</a>
            <?php } else { ?>
                <a href="?page=newpost">Add post</a>
                <a href="?page=account">Account</a>
                <a href="?page=logout">Logout</a>
            <?php } ?>
        </div>
    </nav>

    <div class="wrapper">