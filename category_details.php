<?php 

require 'services/db.php';
$db = OpenCon();

$category_id = $_GET['category_id'];
if (is_numeric($category_id)) {
    $raw_query = "SELECT
            posts.id as id,
            categories.id as category_id,
            categories.title as category_title,
            categories.description as category_description,
            categories.tag as category_tag,
            posts.title as title,
            posts.text as text,
            posts.pubdate as pubdate,
            posts.author_id as author_id
        FROM categories JOIN posts ON categories.id = posts.category_id 
        WHERE categories.id = " . (int) $category_id . ';';
    
    $category_posts = $db->query($raw_query)->fetchAll();
    $sample_post = $category_posts[0];
    $category = array(
        'id' => $sample_post['category_id'],
        'description' => $sample_post['category_id'],
        'title' => $sample_post['category_title'],
        'tag' => $sample_post['category_tag']
    );
} else {
    $category_posts = [];
}

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
        <?php if($category_posts): ?>
            <nav class='mt-4' aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/categories.php">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$category['title'] ?></li>
                </ol>
            </nav>
            <h1 class="mt-2"><?=$category['title'] ?></h1>
            <p class="text-muted text-uppercase fw-light">Все посты</p>
            <?php foreach($category_posts as $post): ?>
                <div class="col-sm-6">
                    <?php require 'components/post_card.php' ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h1 class="mt-5">404  :(</h1>
            <p>Категория не найдена. <a href="/" class="text-reset">Перейти на главную.</a></p>
        <?php endif; ?>
    </div>
    <?php require 'components/footer.php' ?>
    <?php require 'components/base_scripts.php' ?>
</body>