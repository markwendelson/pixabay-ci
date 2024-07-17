<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2 style="margin-top:15px;">Search</h2>
</div>
<div class="container">
    <div class="login-container" style="display:flex;">
        <?php echo form_open('search', 'class="search-form"'); ?>
            <select name="type" id="type">
                <option value="" disabled>Select</option>
                <option value="image">image</option>
                <option value="video">video</option>
            </select>
            <input type="text" id="search" name="search" value="<?php echo set_value('search'); ?>">&nbsp;
            <button type="submit">Search</button>
        <?php echo form_close(); ?>
    </div>
</div>

<div class="gallery">
<?php foreach ($results as $result): ?>
  <div class="item">
    <a href="<?php echo $result->largeImageURL ?? $result->videos->large->url ?>"  target="_blank">

        <img src="<?php echo $result->previewURL ?? $result->videos->small->thumbnail ?>">
    </a>
  </div>
  <?php endforeach; ?>
  </div>
<?= $this->endSection() ?>