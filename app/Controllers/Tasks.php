<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    public function index(): string
    {
        return view('pages/tasks', [
            'title'       => 'All tasks',
            'currentPage' => 'tasks',
            'tasks'       => (new TaskModel())->allTasks(),
        ]);
    }

    public function createForm(): string
    {
        return $this->form([
            'title'     => '',
            'status'    => 'pending',
            'task_date' => date('Y-m-d'),
        ], false);
    }

    public function create(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (! $this->validate($this->taskRules())) {
            return $this->form($this->postedTask(), false, $this->validator);
        }

        (new TaskModel())->insert($this->postedTask() + [
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created.');
    }

    public function edit(int $id): string
    {
        $task = (new TaskModel())->findActive($id);

        if (! $task) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->form($task, true);
    }

    public function update(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $model = new TaskModel();

        if (! $model->findActive($id)) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (! $this->validate($this->taskRules())) {
            return $this->form($this->postedTask(), true, $this->validator, $id);
        }

        $model->update($id, $this->postedTask());

        return redirect()->to('/tasks')->with('success', 'Task updated.');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new TaskModel();

        if (! $model->findActive($id)) {
            return redirect()->to('/tasks')->with('error', 'Task was not found.');
        }

        $model->update($id, ['is_archived' => 1]);

        return redirect()->to('/tasks')->with('success', 'Task archived.');
    }

    private function form(array $task, bool $editing, $validation = null, ?int $id = null): string
    {
        return view('tasks/form', [
            'title'       => $editing ? 'Edit task' : 'New task',
            'currentPage' => 'tasks',
            'task'        => $task,
            'editing'     => $editing,
            'taskId'      => $id ?? ($task['id'] ?? null),
            'validation'  => $validation,
        ]);
    }

    private function taskRules(): array
    {
        return [
            'title'     => 'trim|required|max_length[150]',
            'status'    => 'required|in_list[pending,completed]',
            'task_date' => 'required|valid_date[Y-m-d]',
        ];
    }

    private function postedTask(): array
    {
        return [
            'title'     => trim((string) $this->request->getPost('title')),
            'status'    => (string) $this->request->getPost('status'),
            'task_date' => (string) $this->request->getPost('task_date'),
        ];
    }
}
