<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/include/header.php';

$userRepo = new \Market\Jeweler\Services\UserService();
if (array_key_exists('login', $_REQUEST) && $_REQUEST['login'] === 'Y') {
    $userRepo->login($_REQUEST['first_name'], $_REQUEST['last_name'], $_REQUEST['second_name']);
    header("Location: /catalog.php");
     exit();
} else if (array_key_exists('register', $_REQUEST) &&  $_REQUEST['register'] === 'Y') {
    $userRepo->registration($_REQUEST['first_name'], $_REQUEST['last_name'], $_REQUEST['second_name']);
    header("Location: /catalog.php");
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
                <form>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Имя</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Фамилия</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="second_name" class="form-label">Отчество</label>
                        <input type="text" class="form-control" id="second_name" name="second_name">
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