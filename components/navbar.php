<?php require_once './config.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><?=$config['app_name']?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li id="home_link" class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li id="about_link" class="nav-item">
          <a class="nav-link" href="/about_me.php">About me</a>
        </li>
        <li id="categories_link" class="nav-item">
          <a class="nav-link" href="/categories.php">Categories</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <span class="navbar-text">
          Current user: <?=$user['uid']?> 
          (<?php echo $user['is_anon'] ? 'Anon' : $user['username'] ?>)
        </span>
        <li id="login_link" class="nav-item">
          <a class="nav-link" href="/login.php">Login</a>
        </li>
        <li id="signup_link" class="nav-item">
          <a class="nav-link" href="/sign_up.php">Signup</a>
        </li>
      </ul>
  </div>
</nav>
