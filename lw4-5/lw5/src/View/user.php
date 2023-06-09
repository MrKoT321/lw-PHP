<?php
/**
 * @var App\Model\User $user
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?= htmlentities($user->getLastName()) ?></title>
</head>
<body>
    <div>
        <p>Имя: <?= htmlentities($user->getFirstName()) ?></p>
        <p>Фамилия: <?= htmlentities($user->getLastName()) ?></p>
        <?php if ($user->getMiddleName()): ?>
            <p>Отчество: <?= htmlentities($user->getMiddleName()) ?></p>
        <?php endif; ?>
        <p>Пол: <?= htmlentities($user->getGender()) ?></p>
        <p>Дата рождения: <?= htmlentities($user->getBirthDate()) ?></p>
        <p>Почта: <?= htmlentities($user->getEmail()) ?></p>
        <?php if ($user->getPhone()): ?>
            <p>Телефон: <?= htmlentities($user->getPhone()) ?></p>
        <?php endif; ?>
        <?php if ($user->getAvatarPath()): ?>
            <p>Фотография: </p>            
            <image src='<?= 'uploads/' . $user->getAvatarPath() ?>' />
        <?php endif; ?>
    </div>
</body>
</html>