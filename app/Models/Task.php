<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'task_name', 'task_description', 'task_priority', 'task_image', 'completed'
    ];

        // You may also want to add a cast for the "completed" field:
            protected $casts = [
                'completed' => 'boolean',
            ];
}
