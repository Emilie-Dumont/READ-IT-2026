<?php

//ROUTE PAR DEFAUT : les 10 derniers posts

//PATTERN:/
//URL:?
//CTRL:postsController
//ACTION:index



include_once '../app/controllers/pagesController.php';
$action = $_GET['action'] ?? 'home';
