<div id="completedtasks" class="">
    <div class="row m-b-20">
        <div class="col-md-12">
            <div class="pull-right">
                <div class="icon-links quick-icon-links">
                    <button data-toggle="tooltip" type="button" id="block-view" title="Block view" class="btn btn icon-btn">
                        <i class="block-view fa fa-th-large text-primary"></i>
                    </button>
                </div>
                <div class="icon-links quick-icon-links" style="margin-right: 20px;">
                    <button data-toggle="tooltip" type="button" id="list-view" title="List view" class="btn btn icon-btn">
                        <i class="list-view fa fa-th-list"></i>
                    </button>
                </div>

                <button type="button" class="btn dropdown-toggle btn-primary waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><i class="md md-file-download"></i> Export
                </button>
                <ul class="dropdown-menu" role="menu" style="right: 30px;">
                    <li><a href="#">PDF</a></li>
                    <li><a href="#">Excel CSV</a></li>
                </ul>
                <button type="button" class="btn btn-default waves-effect waves-light" onclick="delete_task('all')"> Delete All</button>

            </div>
        </div>
    </div>
    <div class="row completed-blocks">
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
                                <button data-toggle="tooltip" type="button" id="" title="Delete" class="btn btn icon-btn" onclick="delete_task({!! $task->id !!})">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
