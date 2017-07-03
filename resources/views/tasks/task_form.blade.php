{!! Html::style(url('css/datepicker.css')) !!}
<!-- New Tasks -->
<div class="row new-task_panel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">{!! ($task) ? '<i class="fa fa-pencil"></i> Update' : '<i class="fa fa-plus"></i> New Task' !!}</h4>
        </div>
        <div class="panel-body">
            <form role="form" id="task_form">
                <div class="form-group">
                    <label class="control-label">Task Name</label>
                    <input type="text" class="form-control" name="title" id="title" value="{!! ($task) ? $task->title : '' !!}">
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" rows="5" name="description" id="description">{!! ($task) ? $task->description : '' !!}</textarea>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-4">Due Date</label>
                        <div class="input-group col-md-8">
                            <input type="text" class="form-control date-input" id="due_date" name="due_date" value="{!! ($task) ? $task->due_date : '' !!}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <button type="button" class="create-btn btn btn-primary waves-effect waves-light" onclick="submit_task_form({!! ($task) ? $task->id : '' !!})">
                            {!! ($task) ? 'Update' : 'Create' !!}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- end New Tasks -->
{!! Html::script(url('js/bootstrap-datepicker.js')) !!}

<script>

    $(document).ready(function(){
        $('body').on('focus',".date-input", function(){
            $(this).datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    });

</script>

