<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->description = 'A admin: responsible for all menu item actions.';
        $admin->save();

        $task_viewer = new Role();
        $task_viewer->name = 'Task Viewer';
        $task_viewer->description = 'A task viewer: responsible for "My Tasks" menu actions.';
        $task_viewer->save();

        $task_manager = new Role();
        $task_manager->name = 'Task Manager';
        $task_manager->description = 'A task manager: responsible for "Manage Tasks" menu actions.';
        $task_manager->save();

        $completed_task_manager = new Role();
        $completed_task_manager->name = 'Completed Task Manager';
        $completed_task_manager->description = 'A completed task manager: responsible for "Completed Tasks" menu actions.';
        $completed_task_manager->save();
    }
}
