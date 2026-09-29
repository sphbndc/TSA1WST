<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <p class="overline">PROJECT</p>
    <h1>About</h1>
    <p class="description">Tasks for Today Management System</p>
</section>
<section class="about">
    <p>This task management system was built for IT0049 Web System Technologies. It shows tasks due today and provides a full schedule, a demo profile, and project information.</p>
    <dl class="about-fields">
        <div><dt>Developer</dt><dd>Joseph</dd></div>
        <div><dt>Course</dt><dd>IT0049 - Web System Technologies</dd></div>
        <div><dt>Built with</dt><dd>CodeIgniter 4, PHP, MySQL</dd></div>
    </dl>
</section>
<?= $this->endSection() ?>
