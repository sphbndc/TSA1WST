<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <p class="overline">YOUR SCHEDULE</p>
    <h1>All tasks</h1>
    <p class="description">Every task, ordered by due date.</p>
</section>
<section class="list-section">
    <div class="section-heading">
        <h2>Task list</h2>
        <span><?= count($tasks) ?> <?= count($tasks) === 1 ? 'task' : 'tasks' ?></span>
    </div>
    <?= $this->include('partials/task_rows', ['tasks' => $tasks]) ?>
</section>
<?= $this->endSection() ?>
