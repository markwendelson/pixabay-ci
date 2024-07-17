<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
</head>
<body>
    <div class="login-container">
        <?php echo form_open_multipart('register', 'class="login-form"'); ?>
        <h2>Register</h2>
    
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>">
        </div>
    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>">
        </div>
    
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
    
        <div class="form-group">
            <label for="picture">Picture:</label>
            <input type="file" id="picture" name="picture">
        </div>
    
        <?php echo \Config\Services::validation()->listErrors(); ?>
    
        <br>
        <button type="submit">Register</button>
        <?php echo form_close(); ?>
        <br>
        <span>Already registered?</span>&nbsp;<a href="<?= route_to('login') ?>">Login</a>
    </div>
</body>
</html>
