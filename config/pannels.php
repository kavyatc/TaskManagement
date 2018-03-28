<?php

return [

    [
        'color' => 'primary',
        'icon' => 'envelope',
        'model' => \App\Models\Contact::class,
        'name' => 'admin.new-messages',
        'url' => 'admin/contacts?new=on',
    ],
    [
        'color' => 'green',
        'icon' => 'user',
        'model' => \App\Models\User::class,
        'name' => 'admin.new-registers',
        'url' => 'admin/users?new=on',
    ],
    [
        'color' => 'yellow',
        'icon' => 'pencil',
        'model' => \App\Models\Post::class,
        'name' => 'admin.new-posts',
        'url' => 'admin/posts?new=on',
    ],
    [
        'color' => 'red',
        'icon' => 'comment',
        'model' => \App\Models\Comment::class,
        'name' => 'admin.new-comments',
        'url' => 'admin/comments?new=on',
    ],
    [
        'color' => 'purple',
        'icon' => 'tasks',
        'model' => \App\Models\Task::class,
        'name' => 'admin.new-tasks',
        'url' => 'admin/task?new=on',
    ],
    [
        'color' => 'orange',
        'icon' => 'tasks',
        'model' => \App\Models\EmployeeTask::class,
        'name' => 'admin.new-employee_task',
        'url' => 'admin/employee_task?new=on',
    ],


];