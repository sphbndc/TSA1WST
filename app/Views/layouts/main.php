<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f7f5">
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
        </nav>
        <div class="sidebar-caption">Personal task list</div>
    </aside>
    <main class="main">
        <header class="topbar"><span>Tasks for Today Management System</span><time><?= date('l, F j, Y') ?></time></header>
        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>
    </main>
</div>
</body>
</html>
