<?php 

require_once 'services/db.php';
require_once 'services/users.php';

$db = OpenCon();

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
        navbarSetActiveButton('signup_link')
    </script>
    
    

    <?php require 'components/footer.php' ?>
    <?php require 'components/base_scripts.php' ?>
</body>
</html>