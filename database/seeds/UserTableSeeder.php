<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'Admin')->first();
        $task_viewer = Role::where('name', 'Task Viewer')->first();
        $task_manager = Role::where('name', 'Task Manager')->first();
        $completed_task_manager = Role::where('name', 'Completed Task Manager')->first();

        $user = new User();
        $user->name = 'Administrator';
        $user->email = 'admin@live.com';
        $user->password = bcrypt('P@ssword');
        $user->save();
        $user->roles()->attach($admin);

        $user = new User();
        $user->name = 'Task viewer';
        $user->email = 'task_viewer@live.com';
        $user->password = bcrypt('P@ssword');
        $user->save();
        $user->roles()->attach($task_viewer);

        $user = new User();
        $user->name = 'Task Manager';
        $user->email = 'task_manager@live.com';
        $user->password = bcrypt('P@ssword');
        $user->save();
        $user->roles()->attach($task_manager);

        $user = new User();
        $user->name = 'Completed Task Manager';
        $user->email = 'completed_task_manager@live.com';
        $user->password = bcrypt('P@ssword');
        $user->save();
        $user->roles()->attach($completed_task_manager);
    }
}
