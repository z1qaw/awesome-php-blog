<?php 

require_once 'services/db.php';
require_once 'services/users.php';

$db = OpenCon();

$post_id = $_GET['post_id'];
if (is_numeric($post_id)) {
    $post_query = $db->query(
        "SELECT posts.id as id,
            categories.id as category_id,
            categories.title as category_title,
            categories.description as category_description,
            categories.tag as category_tag,
            posts.title as title,
            posts.text as `text`,
            posts.pubdate as pubdate,
            posts.author_id as author_id 
        FROM posts JOIN categories ON posts.category_id = categories.id 
        WHERE posts.id = " . (int) $post_id . ';');
    $post = $post_query->fetch();
    $post_query = null;
} else {
    $post = null;
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
    <div class="container">
        <?php if($post): ?>
            <div class="row mt-5">
                <div class="col-md-8" id="post_body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="/categories.php/id=<?=$post['category_id']?>">
                                    <?= $post['category_title'] ?>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?=$post['title']?>
                            </li>
                        </ol>
                    </nav>
                    <h1><?=$post['title']?></h1>
                    <p class="mt-3"><?=$post['text']?></p>
                </div>
            </div>
        <?php else: ?>
            <h1 class="mt-5">404  :(</h1>
            <p>Пост не найден. Попробуйте воспользоваться поиском.</p>
        <?php endif; ?>
    </div>
    <?php require 'components/footer.php' ?>
</body>