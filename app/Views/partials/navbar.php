<div class="navbar">
    <div>
        <a href="#" class="navbar-brand">Pixabay API Test</a>
    </div>
    <div>
        <a href="<?= route_to('dashboard') ?>">Dashboard</a>
        <a href="<?= route_to('search') ?>">Search</a>
        <a href="<?= route_to('profile') ?>">Welcome, <?php echo ucwords(session()->get('name')); ?>
            <img src="<?= base_url('uploads/profile/' . session()->get('picture')) ?>" height="25" alt="profile" />
        </a>
        <a href="<?= route_to('logout') ?>">Logout</a>
    </div>
</div>
