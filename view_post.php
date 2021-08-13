<?php 

include 'services/db.php';
$db = OpenCon();

$post_id = $_GET['post_id'];
$post_query = $db->query('SELECT * FROM posts WHERE id = ' . (int) $post_id);
$post = $post_query->fetch();
$post_query = null;

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include 'components/base_head.php' ?>
        <link rel="stylesheet" href="css/styles.css">
    </head>
<body>
    <?php include 'components/navbar.php' ?>
    <div class="container">
        <?php if($post): ?>
            <div class="row">
                <div class="col-md-8" id="post_body">
                    <h1 class="mt-5"><?php echo $post['title'] ?></h1>
                    <p class="mt-3"><?php echo $post['text'] ?></p>
                </div>
            </div>
        <?php else: ?>
            <h1 class="mt-5">404  :(</h1>
            <p>Пост не найден. Попробуйте воспользоваться поиском.</p>
        <?php endif; ?>
    </div>
</body>