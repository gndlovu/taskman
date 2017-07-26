<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Language;

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
        $language = Language::where('name', 'English')->first();

        if(!User::where('email', 'admin@live.com')->count())
        {
            $user = new User();
            $user->language_id = $language->id;
            $user->name = 'Administrator';
            $user->surname = 'Administrator';
            $user->email = 'admin@live.com';
            $user->password = bcrypt('P@ssword');
            $user->save();
            $user->roles()->attach($admin);
        }

        if(!User::where('email', 'task_viewer@live.com')->count())
        {
            $user = new User();
            $user->language_id = $language->id;
            $user->name = 'Task viewer';
            $user->surname = 'Task viewer';
            $user->email = 'task_viewer@live.com';
            $user->password = bcrypt('P@ssword');
            $user->save();
            $user->roles()->attach($task_viewer);
        }

        if(!User::where('email', 'task_manager@live.com')->count())
        {
            $user = new User();
            $user->language_id = $language->id;
            $user->name = 'Task Manager';
            $user->surname = 'Task Manager';
            $user->email = 'task_manager@live.com';
            $user->password = bcrypt('P@ssword');
            $user->save();
            $user->roles()->attach($task_manager);
        }

        if(!User::where('email', 'completed_task_manager@live.com')->count())
        {
            $user = new User();
            $user->language_id = $language->id;
            $user->name = 'Completed Task Manager';
            $user->surname = 'Completed Task Manager';
            $user->email = 'completed_task_manager@live.com';
            $user->password = bcrypt('P@ssword');
            $user->save();
            $user->roles()->attach($completed_task_manager);
        }
    }
}
