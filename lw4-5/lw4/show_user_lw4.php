<?php

function connectDatabase(): PDO
{
    $dsn = 'mysql:host=localhost:3306;dbname=php_course;charset=utf8';
    $user = 'root';
    $password = '1234';
    return new PDO($dsn, $user, $password);
}

function saveUserToDatabase(PDO $connection, User $userParams): int
{
    $query = <<<SQL
        INSERT INTO user (first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path)
        VALUES (:first_name, :last_name, :middle_name, :gender, :birth_date, :email, :phone, :avatar_path)
        SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        ':first_name' => $userParams->getFirstName(),
        ':last_name' => $userParams->getLastName(),
        ':middle_name' => $userParams->getMiddleName(),
        ':gender' => $userParams->getGender(),
        ':birth_date' => $userParams->getBirthDate(),
        ':email' => $userParams->getEmail(),
        ':phone' => $userParams->getPhone(),
        ':avatar_path' => $userParams->getAvatarPath(),
    ]);

    return (int)$connection->lastInsertId();
}

function findUserInDatabase(PDO $connection, int $id): ?User
{
    $query = "SELECT id, first_name, last_name, middle_name, gender, birth_date, email, phone, avatar_path FROM user WHERE id = $id";
    $statement = $connection->query($query);
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        return new User((int)$row['id'], $row['first_name'], $row['last_name'], $row['middle_name'], $row['gender'], $row['birth_date'], $row['email'], $row['phone'], $row['avatar_path']);
    }
    return null;
}

$connection = connectDatabase();
foreach (findUserInDatabase($connection, $_GET["user_id"]) as $user_stat) {
    echo htmlspecialchars($user_stat . "\n", ENT_COMPAT, 'ISO-8859-1', true);
}

