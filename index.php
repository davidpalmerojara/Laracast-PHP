<?php
    require "functions.php";

    require "Database.php";
    // require "router.php";

    // Connect to the MySQL database and execute a query

    $config = require "config.php";
    $db = new Database($config['database']);
    $id = null;

    // Check if an ID parameter is provided in the URL query string
    if (count($_GET) > 0) {
        $id = $_GET['id'];
    }

    // Fetch posts from the database based on the provided ID or all posts
    if ($id) {
        $query = "select * FROM posts WHERE id = :id";
        $posts = $db->query($query, [':id' => $id])->fetch();

        echo "<li>" . $posts['title'] . "</li>";
    } else {
        $query = "select * FROM posts";
        $posts = $db->query($query)->fetchAll();

        foreach ($posts as $post) {
            echo "<li>" . $post['title'] . "</li>";
        }
    }


