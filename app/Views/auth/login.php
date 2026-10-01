<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <p class="overline">ACCOUNT</p>
    <h1>Log in</h1>
    <p class="description">Log in to create, edit, or archive tasks.</p>
</section>
<form class="task-form" action="/login" method="post">
    <?= csrf_field() ?>
    <?php if (isset($loginError)): ?>
        <p class="form-error"><?= esc($loginError) ?></p>
    <?php endif; ?>
    <label for="username">Username or email</label>
    <input id="username" name="username" type="text" maxlength="100" required value="<?= esc(old('username', $username ?? '')) ?>">
    <?php if (isset($validation) && $validation->hasError('username')): ?>
        <p class="form-error"><?= esc($validation->getError('username')) ?></p>
    <?php endif; ?>
    <label for="password">Password</label>
    <input id="password" name="password" type="password" required>
    <?php if (isset($validation) && $validation->hasError('password')): ?>
        <p class="form-error"><?= esc($validation->getError('password')) ?></p>
    <?php endif; ?>
    <button class="primary-button" type="submit">Log in</button>
</form>
<?= $this->endSection() ?>
