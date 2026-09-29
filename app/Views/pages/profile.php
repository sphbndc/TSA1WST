<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <p class="overline">ACCOUNT</p>
    <h1>Profile</h1>
    <p class="description">Demo user information.</p>
</section>
<?php if ($user): ?>
    <section class="profile">
        <div class="profile-initial"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div>
        <div>
            <p class="overline">DEMO USER</p>
            <h2><?= esc($user['full_name']) ?></h2>
            <p class="muted">@<?= esc($user['username']) ?></p>
            <dl class="profile-fields">
                <div><dt>Email</dt><dd><?= esc($user['email']) ?></dd></div>
                <div><dt>Member since</dt><dd><?= date('M j, Y', strtotime($user['created_at'])) ?></dd></div>
            </dl>
        </div>
    </section>
<?php else: ?>
    <p class="empty-state">No profile record found.</p>
<?php endif; ?>
<?= $this->endSection() ?>
