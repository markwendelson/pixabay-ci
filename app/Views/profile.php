<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<h2 style="margin-top:15px;">My Profile</h2>

<?php if(session()->has('success')): ?>
    <div class="success-message">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="login-container">
        <?php echo form_open_multipart('update-picture', 'class="login-form"'); ?>
        <fieldset>
            <legend>Change Picture</legend>
            <div class="row">
                <div>
                    <img src="<?= base_url('uploads/profile/' . session()->get('picture')) ?>" height="100" alt="profile" />
                </div>
                <div>
                    <div class="form-group">
                        <input type="file" id="picture" name="picture" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <button type="submit">Update</button>
                </div>
            </div>
        </fieldset>
        <?php echo \Config\Services::validation()->listErrors(); ?>
    <?php echo form_close(); ?>
    </div>
</div>

<div class="container">
    <div class="login-container">
        <?php echo form_open('profile', 'class="login-form"'); ?>
        <fieldset>
            <legend>Personal Information</legend>
            <div class="row">
                <div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= session()->get('name') ?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= session()->get('email') ?>" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                <button type="submit">Update</button>
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
</div>

<div class="container">
    <div class="login-container">
        <?php echo form_open('update-password', 'class="login-form"'); ?>
        <fieldset>
            <legend>Change Password</legend>
            <div class="row">
                <div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                <button type="submit">Update Password</button>
                </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
</div>
<?= $this->endSection() ?>