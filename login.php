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
        navbarSetActiveButton('login_link')
    </script>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <h1>Login:</h1>
                <div class="card mt-4">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="inputUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="inputUsername">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberCheck">
                                <label class="form-check-label" for="rememberCheck">Don't remember password</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'components/footer.php' ?>
    <?php require 'components/base_scripts.php' ?>
</body>
</html>