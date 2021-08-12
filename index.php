<?php 

include 'services/db.php';
$db = OpenCon();

$categories = $db->query('SELECT * FROM categories;')->fetchAll();
$raw_posts_queries = array();

foreach($categories as $cat) {
    $cat_posts_query = '(SELECT * FROM posts WHERE category_id = ' . $cat['id'] . ' ORDER BY id ASC LIMIT 4)';
    array_push($raw_posts_queries, $cat_posts_query);
}
$full_cat_query = (implode(' UNION ', $raw_posts_queries));
$result = $db->query($full_cat_query)->fetchAll();

$categories_top_posts = array();

foreach($categories as $cat) {
    $posts_of_cat = array_filter($result, function($post) {
        global $cat;
        return ($post['category_id'] == $cat['id']);
    });
    $categories_top_posts[$cat[id]] = array(
        'category' => $cat,
        'posts' => $posts_of_cat
    );
}

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
        navbarSetActiveButton('home_link')
    </script>
    <div class="container mt-2">
        <?php foreach($categories_top_posts as $cat): ?>
            <h2><?php echo $cat['category']['title'] ?></h2>
            <div class="row">
            <?php foreach($cat['posts'] as $post): ?>
                <div class="col-sm-3">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title'] ?></h5>
                            <p class="card-text"><?php echo $post['text'] ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 
            </div>
        <?php endforeach; ?>
        <hr>
    </div>
</body>
</html>