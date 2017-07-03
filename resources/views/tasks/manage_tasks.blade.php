<div id="managetasks" class="">
    <div class="row m-b-20 new-button">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="button" class="btn btn-primary waves-effect waves-light new-task-btn" onclick="get_task_form()">
                    <i class="fa fa-plus"></i> Add New Task
                </button>
            </div>
        </div>
    </div>
    <!-- Created Tasks -->
    <div class="row created-tasks">
        @if($tasks)
            @foreach($tasks as $task)
                <div class="col-sm-6 col-md-4">
                    <div class="panel" style="cursor: pointer;">
                        <div class="panel-header">
                            <div class="due-date text-center pull-right">
                                @php($date = date_create($task->due_date))
                                {!! date_format($date, "d") !!}
                                <br>
                                {!! date_format($date, "M") !!}
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-inner">
                                <div class="panel-inner-content">
                                    <h3>{!! $task->title !!}</h3>
                                    <p>{!! $task->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer" style="padding: 0;text-align: right;">
                            <div class="icon-links quick-icon-links">
                                <button data-toggle="tooltip" type="button" title="Edit" class="btn btn icon-btn" onclick="get_task_form({!! $task->id !!})">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </div>
                            <div class="icon-links quick-icon-links">
                                <button data-toggle="tooltip" type="button" task_id="{!! $task->id !!}" published="{!! $task->published !!}" title="{!! ($task->published) ? 'Unpublish' : 'Publish' !!}" class="btn btn icon-btn" onclick="publish_unpublish_task($(this))">
                                    {!! ($task->published) ? '<i class="fa fa-stop"></i>' : '<i class="fa fa-play"></i>' !!}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div><!-- end Created Tasks -->
</div>
