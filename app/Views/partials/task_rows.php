<?php if (empty($tasks)): ?>
    <p class="empty-state">No tasks scheduled.</p>
<?php else: ?>
    <div class="task-list">
        <?php foreach ($tasks as $task): ?>
            <?php $completed = $task['status'] === 'completed'; ?>
            <article class="task-row">
                <div class="task-name">
                    <span class="check-mark <?= $completed ? 'completed' : '' ?>" aria-hidden="true"><?= $completed ? '✓' : '' ?></span>
                    <span><?= esc($task['title']) ?></span>
                </div>
                <span class="status <?= $completed ? 'completed' : 'pending' ?>"><?= esc(ucfirst($task['status'])) ?></span>
                <time datetime="<?= esc($task['task_date']) ?>"><?= date('M j, Y', strtotime($task['task_date'])) ?></time>
                <?php if (session()->get('userId')): ?>
                    <div class="task-actions">
                        <a href="/tasks/<?= esc($task['id']) ?>/edit">Edit</a>
                        <form action="/tasks/<?= esc($task['id']) ?>/delete" method="post" onsubmit="return confirm('Archive this task?')">
                            <?= csrf_field() ?>
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
