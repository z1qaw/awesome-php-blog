<?php 
require_once 'config.php';
require_once 'services/db.php';
$db = OpenCon();

$raw_query = "SELECT
        categories.id as id,
        categories.title as title,
        categories.description as description,
        categories.tag as tag,
        COUNT(posts.id) as posts_count
    FROM categories JOIN posts ON categories.id = posts.category_id
    GROUP BY categories.id;";

$categories = $db->query($raw_query)->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'components/base_head.php' ?>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php require 'components/navbar.php' ?>

    <script src='js/navbar.js'></script>
    <script>
        navbarSetActiveButton('categories_link')
    </script>

    <div class="container">
        <h1 class="mt-4">Категории</h1>
        <ol class="list-group list-group-numbered mt-4">
            <?php foreach($categories as $category): ?>
                <a href="/category_details.php?category_id=<?=$category['id']?>"  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold"><?=$category['title']?></div>
                    <?=$category['description']?>
                    </div>
                    <span class="badge bg-primary rounded-pill">
                        <?=$category['posts_count']?> постов
                    </span>
                </a>
            <?php endforeach; ?>
        </ol>
    </div>

    <?php require 'components/footer.php' ?>
    <?php require 'components/base_scripts.php' ?>
</body>