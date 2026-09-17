<?php
include_once '../app/models/categoriesModel.php';
include_once '../app/models/postsModel.php';
include_once '../app/models/tagsModel.php';

$categories = \App\Models\CategoriesModel\findAll($connexion);
$recentPosts = \App\Models\PostsModel\findAll($connexion, 3);
$tags = \App\Models\TagsModel\findAll($connexion);
?>
<div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
    <div class="sidebar-box">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <div class="categories">
            <h3>Categories</h3>
            <?php foreach ($categories as $category): ?>
                <li><a href="#"><?php echo $category['name']; ?> <span class="ion-ios-arrow-forward"></span></a></li>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3>Recent Blog</h3>
        <?php foreach ($recentPosts as $recentPost): ?>
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/<?php echo $recentPost['image']; ?>);"></a>
                <div class="text">
                    <h3 class="heading"><a href="posts/<?php echo $recentPost['id']; ?>/<?php echo \Core\Helpers\slugify($recentPost['title']); ?>"><?php echo $recentPost['title']; ?></a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> <?php echo \Core\Helpers\dateFormator($recentPost['created_at'], 'd/m/Y'); ?></a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3>Tag Cloud</h3>
        <div class="tagcloud">
            <?php foreach ($tags as $tag): ?>
                <a href="#" class="tag-cloud-link"><?php echo $tag['name']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>

</div>