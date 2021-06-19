<?php
include './header.php';

$posts = Post::getPostByAuthorId($connection, $_SESSION['user']->id);
if (isset($_GET['id'])) {
    Post::deleteById($connection, $_GET['id']);
    redirect('posts');
}
?>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h4 class="m-0">Your Posts</h4>
                        <a href="./create_post.php" class="btn btn-outline-primary">Create Post</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post) {  ?>
                                        <tr>

                                            <td><?php echo $post->title; ?>
                                                <div class="table-links">
                                                    <a href="./view_post.php?id=<?php echo $post->id; ?>">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="./update_post.php?id=<?php echo $post->id; ?>">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="./posts.php?id=<?php echo $post->id; ?>" class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#"><?php echo $post->category; ?></a>
                                            </td>
                                            <td> <?php echo $post->created_at; ?> </td>
                                            <td>
                                                <div class="badge badge-<?php echo getStatusColor($post->status); ?> "><?php echo $post->status; ?></div>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include './footer.php';
