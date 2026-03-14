<?php
try {
  // setea internamente apdo
  include __DIR__ . '/../includes/DatabaseConnection.php';
  include __DIR__ . '/../includes/DatabaseFunctions.php';
        
  
  $jokes = allJokes($pdo);
  $title = 'Joke list';
  $totalJokes = totalJokes($pdo);

  // abre el buffer (Output Buffer)
  ob_start();
  // incluye el partial al buffer
  include '../templates/jokes.html.php';
  // guarda el contenido del buffer en una variable
  $output = ob_get_clean();
}
catch (PDOException $e) {
  $output = 'Unable to connect to the database server: ' . $e->getMessage() .
  ' in ' . $e->getFile() . ':' . $e->getLine();
  ;
}

// incluye en template en la salida de respuesta
// aqui se usa la variable del buffer
include  __DIR__ . '/../templates/layout.html.php';