<?php


namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return;
        }

        Task::factory()->count(50)->make()->each(function ($task) use ($users) {
            $task->user_id = $users->random()->id;
            $task->save();
        });
    }
}
