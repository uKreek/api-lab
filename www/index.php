<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>Document</title>
</head>

</html>

<?php if(isset($_SESSION['username'])): ?>
    <p>Данные из сессии:</p>
    <ul>
        <li>Имя: <?= $_SESSION['username'] ?></li>
        <li>Email: <?= $_SESSION['email'] ?></li>
    </ul>
<?php else: ?>
    <p>Данных пока нет.</p>
<?php endif; ?>

<a href="form.html">Заполнить форму</a> |
<a href="view.php">Посмотреть все данные</a> |
<a href="cookies.php">Куки</a>

<?php if(isset($_SESSION['errors'])): ?>
    <ul style="color:red;">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['api_data']['categories'][3]['strCategoryDescription'])) {
    echo "<h3>Данные из API:</h3>";
    echo "<pre>" . print_r($_SESSION['api_data']['categories'][3]['strCategoryDescription'], true) . "</pre>";
} ?>

<?php require_once 'UserInfo.php';
$info = UserInfo::getInfo();

echo "<h3>Информация о пользователе:</h3>";
foreach ($info as $key => $val) {
    echo htmlspecialchars($key) . ': ' . htmlspecialchars($val) . '<br>';
} ?>


