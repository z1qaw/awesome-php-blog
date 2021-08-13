<?php 

include 'services/db.php';
$db = OpenCon();

$category_id = $_GET['category_id'];
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/base_head.php' ?>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <script src='js/navbar.js'></script>
    <script>
        navbarSetActiveButton('categories_link')
    </script>

    <div class="container">
        <?php if($category_posts): ?>
            <h1 class="mt-4"><?php echo $category['title'] ?></h1>
            <p class="text-muted text-uppercase fw-light">Все посты</p>
            <?php foreach($category_posts as $post): ?>
                <div class="col-sm-6">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted fw-light"><?php echo $post['pubdate'] ?></h6>
                            <p class="card-text"><?php echo substr($post['text'], 0, 120) . ' ...' ?></p>
                            <a href="/view_post.php?post_id=<?php echo $post['id'] ?>" class="btn btn-primary">Go to post</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h1 class="mt-5">404  :(</h1>
            <p>Категория не найдена. <a href="/" class="text-reset">Перейти на главную.</a></p>
        <?php endif; ?>
    </div>
    <?php include 'components/footer.php' ?>
</body>