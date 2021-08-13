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


    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">My Awesome Blog</h1>
      <p class="lead fw-normal">This is my simple PHP blog engine.</p>
      <a class="btn btn-outline-dark" href="#">Get on GitHub</a>
    </div>

    <div class="container mt-2">
        <?php foreach($categories_top_posts as $cat): ?>
            <div class="category_block mt-5">
                <a href="/category_details.php?category_id=<?php echo $cat['category']['id'] ?>" class="text-decoration-none">
                    <h2><?php echo $cat['category']['title'] ?></h2>
                </a>
                <p class="text-muted text-uppercase fw-light">Последниe посты</p>
                <div class="row">
                <?php foreach($cat['posts'] as $post): ?>
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
                </div>
            </div>
        <?php endforeach; ?>
    </div>

  <?php include 'components/footer.php' ?>

</body>
</html>