<?php

if (isset($_POST['joke_id'])) {
    try {
        // setea internamente apdo
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';

        deleteJoke($pdo, $_POST['joke_id']);
        header('location: jokes.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in ' .
        $e->getFile() . ':' . $e->getLine();
    }
    include  __DIR__ . '/../templates/layout.html.php';
} else {
    http_response_code(404);
}

