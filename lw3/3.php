<?php

$first_name = htmlentities($_POST["first_name"]);
$last_name = htmlentities($_POST["last_name"]);
$gender = htmlentities($_POST["gender"]);
$birth_date = htmlentities($_POST["birth_date"]);
$email = htmlentities($_POST["email"]);

if(isset($_POST["middle_name"]) && $_POST["phone"] !== "")
{
    $middle_name = htmlentities($_POST["middle_name"]);
}
else
{
    $middle_name = NULL;
}

if(isset($_POST["phone"]) && $_POST["phone"] !== "")
{
    $phone = htmlentities($_POST["phone"]);
}
else
{
    $phone = NULL;
}

if ($_FILES && $_FILES["avatar_path"]["error"] == UPLOAD_ERR_OK)
{
    $avatar_path = $_FILES["avatar_path"]["name"];
    move_uploaded_file($_FILES["avatar_path"]["tmp_name"], $avatar_path);
    echo "$avatar_path";
}
else
{
    print_r($_FILES);
    $avatar_path = NULL;
}

$userParams = [
    'first_name' => $first_name,
    'last_name' => $last_name,
    'middle_name' => $middle_name,
    'gender' => $gender,
    'birth_date' => $birth_date,
    'email' => $email,
    'phone' => $phone,
    'avatar_path' => $avatar_path,
];

$filename = 'todo.json';
if ($userParams && file_exists($filename))
{
    $json = file_get_contents($filename);
    $jsonArray = json_decode($json, true);
    $jsonArray[] = $userParams;
    $json = json_encode($userParams, JSON_UNESCAPED_UNICODE);
}

?>