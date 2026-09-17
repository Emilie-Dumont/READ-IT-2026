<?php

define('PUBLIC_BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] .   dirname($_SERVER['PHP_SELF']) . '/');

define('ADMIN_BASE_URL', str_replace('www', 'back', PUBLIC_BASE_URL));
