<?php

/** @var array $post */
?>
<p class="mb-5">
    <img src="images/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="img-fluid">
</p>

<h1 class="mb-3 h1"><?php echo $post['title']; ?></h1>
<div><?php echo $post['content']; ?></div>

<div class="tag-widget post-tag-container mb-5 mt-5">
    <div class="tagcloud">
        <?php foreach ($tags as $tag): ?>
            <a href="#" class="tag-cloud-link"><?php echo $tag['name']; ?></a>
        <?php endforeach; ?>
    </div>
</div>

<div class="about-author d-flex p-4 bg-light">
    <div class="bio mr-5">
        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
    </div>
    <div class="desc">
        <h3><?php echo $author['firstname'] . ' ' . $author['lastname']; ?></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
    </div>
</div>

<div class="pt-5 mt-5">
    <h3 class="mb-5"><?php echo count($comments); ?> Comments</h3>
    <ul class="comment-list">
        <?php foreach ($comments as $comment): ?>
            <li class="comment">
                <div class="comment-body">
                    <h3><?php echo $comment['pseudo']; ?></h3>
                    <div class="meta mb-3"><?php echo \Core\Helpers\dateFormator($comment['created_at'], 'd/m/Y à H:i'); ?></div>
                    <p><?php echo $comment['content']; ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- END comment-list -->
    <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Leave a comment</h3>
        <form action="comments/add" class="p-5 bg-light" method="post">
            <div class="form-group">
                <label for="pseudo">Name *</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="form-group">
                <label for="content">Message</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="postId" value="<?php echo $post['id']; ?>" />
                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
            </div>
        </form>
    </div>
</div>