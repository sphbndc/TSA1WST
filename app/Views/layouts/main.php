<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f8f5">
    <title><?= esc($title) ?> | Tasks for Today</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="shell">
    <aside class="sidebar">
        <a class="brand" href="/">Tasks for Today</a>
        <nav class="navigation" aria-label="Main navigation">
            <a class="nav-link <?= $currentPage === 'today' ? 'active' : '' ?>" href="/">Today</a>
            <a class="nav-link <?= $currentPage === 'tasks' ? 'active' : '' ?>" href="/tasks">All tasks</a>
            <a class="nav-link <?= $currentPage === 'profile' ? 'active' : '' ?>" href="/profile">Profile</a>
            <a class="nav-link <?= $currentPage === 'about' ? 'active' : '' ?>" href="/about">About</a>
            <?php if (session()->get('userId')): ?>
                <a class="nav-link" href="/tasks/new">New task</a>
                <form class="nav-form" action="/logout" method="post">
                    <?= csrf_field() ?>
                    <button class="nav-link nav-button" type="submit">Log out</button>
                </form>
            <?php else: ?>
                <a class="nav-link <?= $currentPage === 'login' ? 'active' : '' ?>" href="/login">Log in</a>
            <?php endif; ?>
        </nav>
        <div class="sidebar-caption">Personal task list</div>
    </aside>
    <main class="main">
        <header class="topbar"><span>Tasks for Today Management System</span><time><?= date('l, F j, Y') ?></time></header>
        <div class="content">
            <?php if ($message = session()->getFlashdata('success')): ?>
                <p class="notice"><?= esc($message) ?></p>
            <?php endif; ?>
            <?php if ($message = session()->getFlashdata('error')): ?>
                <p class="notice error"><?= esc($message) ?></p>
            <?php endif; ?>
            <?= $this->renderSection('content') ?>
        </div>
    </main>
</div>
</body>
</html>
