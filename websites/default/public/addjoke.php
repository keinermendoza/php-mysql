<?php
// forma de checkear if POST
if (isset($_POST['joke_text'])) {
    try {
        // setea internamente apdo
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';

        // insertar datos
        // $sql = 'INSERT INTO `jokes` SET
        // `joke_text` = :joke_text,
        // `joke_date` = CURDATE()';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':joke_text', $_POST['joke_text']);
        // $stmt->execute();

        insertJoke($pdo, $_POST['joke_text'], 1);

        // redirigir a algun lugar
        // escribe en la cabecera del documento. siempre antes de excribir la response real
        header('location: jokes.php');
        // deberia ejecutar un exit para evitar que se ejecute mas contenido
        // al hacer un cambio de location el browser ignora el body de la response
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
    }
} 
// Asumiendo GET
    else {
    $title = 'Add a new joke';
    
    // render form
    ob_start();
    include  __DIR__ . '/../templates/addjoke.html.php';
    $output = ob_get_clean();
}
include  __DIR__ . '/../templates/layout.html.php';