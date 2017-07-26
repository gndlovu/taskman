<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++)
        {
            if(!Task::where('title', "Task $i")->count())
            {
                $today = time();
                $next60days = strtotime("+60 days", $today);
                $int = rand($today, $next60days);

                $task = new Task();
                $task->title = "Task $i";
                $task->description = "Task $i description";
                $task->due_date = date("Y-m-d", $int);
                $task->save();
            }
        }
    }
}
