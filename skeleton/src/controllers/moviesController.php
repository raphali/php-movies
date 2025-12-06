<?php

$error = [];

if (!empty($_POST)) {
    $movies = new Models\Movie();

    try {
        $movies->setTitle($_POST['title']);
    } catch (\Exception $e) {
        $error['title'] = $e->getMessage();
    }
    try {
        $movies->setType($_POST['type']);
    } catch (\Exception $e) {
        $error['type'] = $e->getMessage();
    }
    try {
        $movies->setRating($_POST['rating']);
    } catch (\Exception $e) {
        $error['rating'] = $e->getMessage();
    }

    if (empty($error)) {
        if ($movies->getAll()) {
            redirectTo('/');
        } else {
            redirectTo('src/views/404.php');
        }
    }
}

render('index', false, [
	'error' => $error,
]);
