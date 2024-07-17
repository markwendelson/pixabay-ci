<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixabay API Test</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/fieldset.css') ?>">
</head>
<body>
    <!-- Include the header partial -->
    <?= view('partials/navbar') ?>


    <!-- Main content section -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <!-- <script>
        $(document).ready(function() {
            $('#search').on('submit', function(e) {
                e.preventDefault();
                var query = $('#query').val();
                $.ajax({
                    url: '/search',
                    method: 'POST'
                    data: 
    </script> -->
</body>
</html>
