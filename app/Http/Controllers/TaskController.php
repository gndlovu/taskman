<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Task;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_task_list($which_tasks)
    {
        if ($which_tasks === "published_tasks")
        {
            $tasks = Task::where('published', 1)->orderBy('due_date')->get();
        }
        elseif ($which_tasks === "completed_tasks")
        {
            $tasks = Task::where('published', 0)->orderBy('due_date')->get();
        }
        else
        {
            $tasks = Task::orderBy('due_date')->get();
        }

        $html = view("tasks." . $which_tasks, compact('tasks'))->render();

        return json_encode(["status" => true, "content" => $html, 'total_tasks' => count($tasks)]);
    }

    public function mark_as_completed(Request $request)
    {
        $completed_tasks = $request->completed_tasks;

        for ($i = 0; $i < count($completed_tasks); $i++)
        {
            Task::where('id', $completed_tasks[$i])->update(['published' => 0]);
        }

        return json_encode(["status" => true]);
    }

    public function get_task_form($task_id = null)
    {
        $task = ($task_id) ? Task::find($task_id) : [];

        $html = view("tasks.task_form", compact('task'))->render();

        return json_encode(["status" => true, "content" => $html]);
    }

    public function update_task(Request $request)
    {
        $task_info = $request->data;

        $task = Task::find($task_info['task_id']);
        $task->title = $task_info['title'];
        $task->description = $task_info['description'];
        $task->due_date = $task_info['due_date'];
        $task->save();

        return json_encode(["status" => true]);
    }

    public function add_task(Request $request)
    {
        $task_info = $request->data;

        $task = new Task();
        $task->title = $task_info['title'];
        $task->description = $task_info['description'];
        $task->due_date = $task_info['due_date'];
        $task->save();

        return json_encode(["status" => true]);
    }

    public function publish_unpublish_task(Request $request)
    {
        $task_id = $request->task_id;
        $published = $request->published;

        Task::where('id', $task_id)->update(['published' => ($published) ? 0 : 1]);

        return json_encode(["status" => true]);
    }

    public function delete_task($which_task)
    {
        if($which_task === 'all')
        {
            Task::where('published', 0)->delete();
        }
        else
        {
            Task::where('id', $which_task)->delete();
        }

        return json_encode(["status" => true]);
    }
}
