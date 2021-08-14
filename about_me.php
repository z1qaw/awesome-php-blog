<?php require_once './config.php'; ?>

<!DOCTYPE html>
<head>
    <?php require 'components/base_head.php' ?>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php require 'components/navbar.php' ?>
    <script src='js/navbar.js'></script>
    <script>
        navbarSetActiveButton('about_link')
    </script>
    <div class="container mt-2">
        <h2>About me</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, eum magni hic porro nam excepturi impedit voluptatem laboriosam. Possimus rerum officia illum soluta libero unde, mollitia commodi vitae laudantium accusamus.</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci libero qui quisquam saepe ipsum maxime illum aut consectetur magnam. Distinctio fugiat quos debitis saepe unde aliquid animi mollitia vitae cupiditate.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita porro labore voluptatem quidem quae non ab. Accusantium cumque expedita quam praesentium adipisci deserunt, consequatur excepturi, tempora, eius recusandae animi nobis?</p>
    </div>

    <?php require 'components/footer.php' ?>
    <?php require 'components/base_scripts.php' ?>
</body>
</html>