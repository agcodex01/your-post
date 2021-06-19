<?php
include_once './header.php';

$posts = Post::getAllPublishedPost($connection);
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="m-0">Post Feed</h4>

            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <?php foreach ($posts as $post) { ?>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo strlen($post->title) > 20 ? substr($post->title, 0, 20) . "..."  : $post->title; ?><span style="font-size: 10px;" class="badge ml-2 badge-info"><?php echo $post->category; ?></span> </h4>
                    <div class="card-header-action">
                        <a href="./view_post.php?id=<?php echo $post->id; ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Author : <?php echo $post->author; ?> </p>
                    <?php if (substr_count($post->body, "</p>") > 1) {
                        echo  substr($post->body, strpos($post->body, "<p>"), strpos($post->body, "</p>") + 4) . "read more ...";
                    } else {
                        echo strtok($post->body, "\n");
                        // echo $post->body;
                    } ?>
                </div>
                <div class="card-footer">
                    <?php echo "Created : " . date_format(date_create($post->created_at), "M d Y"); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include './footer.php';
