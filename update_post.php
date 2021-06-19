<?php
require_once './header.php';



if (isset($_POST['post_btn_submit_update'])) {

    $request = new  PostRequest($_POST);

    Post::updatePost($connection, $request, $_POST['id']);

    if (Auth::user()->user_type == 'admin') {
        redirect('admin');
    } else {
        redirect('posts');
    }
} elseif (isset($_POST['post_btn_submit_publish'])) {
    Post::publishPost($connection,  $_POST['id']);
    redirect('admin');
} else {
    $post = Post::findPostById($connection, $_GET['id']);
}

?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="m-0">Update Post</h4>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="title" value="<?php echo $post->title; ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="category">
                                        <option <?php selected('Tech', $post->category); ?>>Tech</option>
                                        <option <?php selected('News', $post->category); ?>>News</option>
                                        <option <?php selected('Political', $post->category); ?>>Political</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" name="body"> <?php echo $post->body ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary" name="post_btn_submit_update">Update Post</button>
                                    <?php if (Auth::getRole() == 'admin') { ?>
                                        <button type="submit" class="btn btn-info" name="post_btn_submit_publish">Publish Post</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include './footer.php'; ?>