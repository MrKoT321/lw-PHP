<?php

$firstName = htmlentities($_POST["first_name"]);
$lastName = htmlentities($_POST["last_name"]);
$gender = htmlentities($_POST["gender"]);
$birthDate = htmlentities($_POST["birth_date"]);
$email = htmlentities($_POST["email"]);

if (isset($_POST["middle_name"])) {
    $middleName = htmlentities($_POST["middle_name"]);
} else {
    $middleName = null;
}

if (isset($_POST["phone"])) {
    $phone = htmlentities($_POST["phone"]);
} else {
    $phone = null;
}

if ($_FILES && $_FILES["avatar_path"]["error"] == UPLOAD_ERR_OK) {
    $avatarPath = $_FILES["avatar_path"]["name"];
    move_uploaded_file($_FILES["avatar_path"]["tmp_name"], $avatarPath);
} else {
    $avatarPath = null;
}

$userParams = [null, $firstName, $lastName, $middleName, $gender, $birthDate, $email, $phone, $avatarPath];

$connection = connectDatabase();
$userId = saveUserToDatabase($connection, $userParams);

$redirectUrl = "/show_user.php?user_id=$userId";
header('Location: ' . $redirectUrl, true, 303);
die();
