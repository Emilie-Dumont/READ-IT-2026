<?php

// ROUTES POSTS
// PATTERN: /posts/...
// URL: ?posts=...
// ROUTER posts
if (isset($_GET['posts'])):
    include_once '../app/routers/posts.php';

// ROUTES USERS
// PATTERN: /users/...
// URL: ?users=...
// ROUTER users
elseif (isset($_GET['users'])):
    include_once '../app/routers/users.php';

// ROUTES COMMENTS
// PATTERN: /comments/...
// URL: ?comments=...
// ROUTER comments
elseif (isset($_GET['comments'])):
    include_once '../app/routers/comments.php';

// ROUTE CONTACT
// PATTERN: /contact
// URL: ?contact
elseif (isset($_GET['contact'])):
    $title = "Contact";
    ob_start();
    include '../app/views/templates/partials/_contact.php';
    $content = ob_get_clean();

// ROUTE PAR DÉFAUT: Les 10 derniers posts
// PATTERN: /
// URL: ?
// CTRL: postsController
// ACTION: index
else:
    include_once '../app/controllers/postsController.php';
    \App\Controllers\PostsController\indexAction($connexion);
endif;
