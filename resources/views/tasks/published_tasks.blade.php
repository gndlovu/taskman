<div id="mytasks" class="">
    <div class="row m-b-20">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="mark_as_completed()">Mark as complete</button>
            </div>
        </div>
    </div>
    <div class="row">
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
                            <div class="checkbox checkbox-primary ">
                                <input class="todo-done published_task" id="{!! $task->id !!}" type="checkbox">
                                <label for="{!! $task->id !!}"></label>
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
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>


