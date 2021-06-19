<?php
require_once './header.php';


$post = Post::findPostById($connection, $_GET['id']);

?>
<div class="row">
    <div class="col-12">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="m-0">View Post</h4>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">

    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4><?php echo  $post->title; ?> <span style="font-size: 10px;" class="badge ml-2 badge-info"><?php echo $post->category; ?></span></h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Author : <?php echo $post->author; ?> </p>
                <?php echo $post->body; ?>
            </div>
            <div class="card-footer">
                <?php echo "Created : " . date_format(date_create($post->created_at), "M d Y"); ?>
            </div>
        </div>
    </div>

</div>

<?php include './footer.php'; ?>