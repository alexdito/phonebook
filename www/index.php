<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$userRepo = new \Market\Jeweler\Services\UserService();
if (array_key_exists('login', $_REQUEST) && $_REQUEST['login'] === 'Y') {
    $userRepo->login($_REQUEST['fio'], $_REQUEST['phone']);

    if ($_SESSION['MARKET']['LOGIN'] !== false) {
        header("Location: /catalog/");
        exit();
    }
} else if (array_key_exists('register', $_REQUEST) &&  $_REQUEST['register'] === 'Y') {
    $userRepo->registration($_REQUEST['fio'], $_REQUEST['phone']);
    header("Location: /catalog/");
     exit();
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Login Form</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Вход</h2>
                <?php if ($_SESSION != null && $_SESSION['MARKET']['LOGIN'] === false) {
                    echo "Пользователя с такими данными не существует!";
                } ?>
                <form>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="fio" name="fio">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Номер телефона</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <button type="submit" value="Y" name="login" class="btn btn-primary">Войти</button>
                    <button type="submit" value="Y" name="register" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';
?>