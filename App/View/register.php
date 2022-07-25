<?php
    require_once './../error_message.php';
    require_once './../models/user.php';

    $errors = new ErrorMessage();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validation data
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


    

        if(trim($username) == '')
            $errors->set('username' , 'فیلد نام کاربری نمی تواند خالی باشد');

        if(trim($email) == '')
            $errors->set('email' , 'فیلد ایمیل نمی تواند خالی باشد');

        if(trim($password) == '')
            $errors->set('password' ,  'فیلد پسورد نمی تواند خالی باشد');

        if( $errors->count() <= 0) {
            try {
                $user = new User();
                $result = $user->create(compact('username' , 'email' , 'password'));

                if($result) {
                    require "App/View/login.php";
                }

                // $errors->set('username' , 'اضافه شدن کاربر با موفقیت انجام نشد');
            } catch (Exception $e) {
                echo $e;
            }
        }




    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" bg-gray-700">
<div class="container mx-auto space-y-4">
    <div class="sm:mx-auto sm:w-full sm:max-w-md mt-10">
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
            Register your account
        </h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="/auth/register.php" method="POST" novalidate>
            
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <div class="mt-1">
                        <input id="username" name="username" type="text" autocomplete="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($errors->has('username')) : ?>
                            <span class="text-red-500 text-sm"><?= $errors->first('username') ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($errors->has('email')) : ?>
                            <span class="text-red-500 text-sm"><?= $errors->first('email') ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($errors->has('password')) : ?>
                            <span class="text-red-500 text-sm"><?= $errors->first('password') ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>