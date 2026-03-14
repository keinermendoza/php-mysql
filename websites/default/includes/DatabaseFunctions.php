<?php

function totalJokes($database): int {
  $stmt = $database->prepare('SELECT COUNT(*) FROM `jokes`');
  $stmt->execute();

  $row = $stmt->fetch();

  return $row[0];
}

function getJoke($pdo, int $id) {
  $stmt = $pdo->prepare('SELECT * FROM `jokes` WHERE `id` = :id');

  $values = [
    'id' => $id
  ];
  $stmt->execute($values);

  return $stmt->fetch();
}

function insertJoke($pdo, $jokeText, $authorId) {
  $stmt = $pdo->prepare('INSERT INTO `jokes` (`joke_text`, `joke_date`, `author_id`)
      VALUES (:joke_text, :joke_date, :author_id)');

  $values = [
    ':joke_text' => $jokeText, 
    ':author_id' => $authorId,
    ':joke_date' => date('Y-m-d')
  ];

  $stmt->execute($values);
}

function updateJoke($pdo, $jokeId, $joketext, $authorId) {
    $stmt = $pdo->prepare(
        'UPDATE `jokes` SET 
        `author_id` = :author_id, 
        `joke_text` = :joke_text 
        WHERE `id` = :id'
    );

    $values = [
        ':joke_text' => $joketext,
        ':author_id' => $authorId,
        ':id' => $jokeId
    ];

    $stmt->execute($values);

}

function deleteJoke($pdo, $id) {

  $stmt = $pdo->prepare('DELETE FROM `jokes` WHERE `id` = :id');

  $values = [
    ':id' => $id
  ];

  $stmt->execute($values);
}

function allJokes($pdo) {
  $stmt = $pdo->prepare('SELECT `jokes`.`id`, `joke_text`, `name`, `email`
    FROM `jokes` INNER JOIN `authors`
      ON `author_id` = `authors`.`id`');

  $stmt->execute();

  return $stmt->fetchAll();
}