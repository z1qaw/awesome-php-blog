<div class="col-sm-6">
    <div class="card mt-2 mb-3">
        <div class="card-header">
            <small class="text-muted">Published at <?=$post['pubdate']?></small>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?=$post['title']?></h5>
            <h6 class="card-subtitle mb-2 text-muted fw-light"><?=$post['pubdate']?></h6>
            <p class="card-text"><?=substr($post['text'], 0, 120).' ...'?></p>
            <a href="/view_post.php?post_id=<?=$post['id']?>" class="btn-sm btn btn-outline-primary text-uppercase">Go to post</a>
        </div>
    </div>
</div>