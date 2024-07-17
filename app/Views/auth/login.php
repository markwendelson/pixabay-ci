<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/auth.css') ?>">
  </head>
<body>
    <div class="login-container">
        <?php if(session()->has('success')): ?>
            <div class="success-message">
                <?= session()->get('success') ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('login', 'class="login-form"'); ?>
        <h2>Login</h2>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
    
        <?php echo \Config\Services::validation()->listErrors(); ?>
    
        <br>
        <button type="submit">Login</button>
        <?php echo form_close(); ?>
        <br>
        <span>Not yet registered?</span>&nbsp;<a href="<?= route_to('register') ?>">Register</a>

    </div>
</body>
</html>
