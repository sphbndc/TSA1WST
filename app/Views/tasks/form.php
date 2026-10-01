<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <p class="overline">TASK MANAGEMENT</p>
    <h1><?= $editing ? 'Edit task' : 'New task' ?></h1>
    <p class="description">Enter a title, status, and due date.</p>
</section>
<form class="task-form" action="<?= $editing ? '/tasks/' . esc($taskId) . '/update' : '/tasks' ?>" method="post">
    <?= csrf_field() ?>
    <label for="title">Title</label>
    <input id="title" name="title" type="text" maxlength="150" required value="<?= esc(old('title', $task['title'])) ?>">
    <?php if (isset($validation) && $validation->hasError('title')): ?>
        <p class="form-error"><?= esc($validation->getError('title')) ?></p>
    <?php endif; ?>
    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="pending" <?= old('status', $task['status']) === 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="completed" <?= old('status', $task['status']) === 'completed' ? 'selected' : '' ?>>Completed</option>
    </select>
    <?php if (isset($validation) && $validation->hasError('status')): ?>
        <p class="form-error"><?= esc($validation->getError('status')) ?></p>
    <?php endif; ?>
    <label for="task_date">Due date</label>
    <input id="task_date" name="task_date" type="date" required value="<?= esc(old('task_date', $task['task_date'])) ?>">
    <?php if (isset($validation) && $validation->hasError('task_date')): ?>
        <p class="form-error"><?= esc($validation->getError('task_date')) ?></p>
    <?php endif; ?>
    <div class="form-actions">
        <button class="primary-button" type="submit"><?= $editing ? 'Save changes' : 'Create task' ?></button>
        <a href="/tasks">Cancel</a>
    </div>
</form>
<?= $this->endSection() ?>
