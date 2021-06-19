<?php
include_once('./header.php');
canView('admin', Auth::getRole());
$posts = Post::all($connection);
if (isset($_GET['id'])) {
    Post::deleteById($connection, $_GET['id']);
    if (Auth::getRole() == 'admin') {
        redirect('admin');
    } else {
        redirect('posts');
    }
}
?>
<div class="row">

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card card-primary">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-12 pr-0 pt-3">
                            <div class=" card-content">
                                <h5 class="font-15"> Posters</h5>
                                <h2 class="mb-3 font-18"> <?php echo User::countUsers($connection); ?></h2>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card card-success">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-lg-12 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15"> Published Post</h5>
                                <h2 class="mb-3 font-18"> <?php echo Post::countPublishedPost($connection); ?></h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card card-warning">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row ">
                        <div class="col-12 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15"> Pending Post</h5>
                                <h2 class="mb-3 font-18"> <?php echo Post::countPendingPost($connection); ?></h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h4 class="m-0">Posts</h4>
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

                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post) {  ?>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                    <span class="d-inline-block ml-1"><?php echo $post->author; ?></span>
                                                </a>
                                            </td>
                                            <td><?php echo $post->title; ?>
                                                <div class="table-links">
                                                    <a href="./view_post.php?id=<?php echo $post->id; ?>">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="./update_post.php?id=<?php echo $post->id; ?>">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="./admin.php?id=<?php echo $post->id; ?>" class="text-danger">Trash</a>
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

<?php
include_once('./footer.php');

?>