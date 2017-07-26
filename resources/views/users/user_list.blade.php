<div id="completedtasks" class="">
    <div class="row m-b-20">
        <div class="col-md-12">
            <div class="pull-right">
                <div class="icon-links quick-icon-links">
                    <button data-toggle="tooltip" type="button" id="block-view" title="Block view" class="btn btn icon-btn" onclick="get_user_list('block_view')">
                        <i class="block-view fa fa-th-large {!! ($which_view === 'block_view') ? 'text-primary' : '' !!}"></i>
                    </button>
                </div>
                <div class="icon-links quick-icon-links" style="margin-right: 20px;">
                    <button data-toggle="tooltip" type="button" id="list-view" title="List view" class="btn btn icon-btn" onclick="get_user_list('list_view')">
                        <i class="list-view fa fa-th-list {!! ($which_view === 'list_view') ? 'text-primary' : '' !!}"></i>
                    </button>
                </div>

                <button type="button" class="btn dropdown-toggle btn-primary waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><i class="md md-file-download"></i> Export
                </button>
                <ul class="dropdown-menu" role="menu" style="right: 30px;">
                    <li><a href="#">PDF</a></li>
                    <li><a href="#">Excel CSV</a></li>
                </ul>
                <button type="button" class="btn btn-default waves-effect waves-light" onclick="delete_user('all')"> Delete All</button>

            </div>
        </div>
    </div>
    <div class="row">
        @if(count($users))
            @if($which_view === 'list_view')
                <div class="col-md-12">
                    <table class="table table-hover table-striped" style="font-size: small">
                        <thead>
                        <tr>
                            <th width="10%">Name</th>
                            <th width="10%">Surname</th>
                            <th width="15%">E-mail Address</th>
                            <th width="15%">Created At</th>
                            <th width="38%" class="text-center">User Access</th>
                            <th width="2%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->surname !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->created_at !!}</td>
                                <td class="text-center">
                                    @if($roles)
                                        @foreach($roles as $role)
                                            <div class="checkbox checkbox-primary checkbox-inline">
                                                <input class="todo-done published_task" {!! ($user->hasRole($role->name)) ? 'checked' : '' !!} id="access_{!! $user->id . '_' . $role->id !!}"
                                                       type="checkbox" onchange="update_user_access('{!! $user->id  !!}', '{!! $role->id  !!}')">
                                                <label for="access_{!! $user->id . '_' . $role->id !!}" onclicktest="update_user_access('{!! $user->id  !!}', '{!! $role->id  !!}')">
                                                    {!! $role->name !!}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center text-danger">
                                    <button data-toggle="tooltip" type="button" id="" title="Delete" class="btn btn icon-btn" onclick="delete_user({!! $user->id !!})">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                @foreach($users as $user)
                    <div class="col-sm-6 col-md-4">
                        <div class="panel" style="cursor: pointer;">
                            <div class="panel-header">
                                <div class="due-date text-center pull-right">
                                    {!! $user->created_at !!}
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="panel-inner">
                                    <div class="panel-inner-content">
                                        <h3>{!! $user->name !!}</h3>
                                        <small class="text-info">{!! $user->email !!}</small>
                                        <hr>
                                        @if($roles)
                                            @foreach($roles as $role)
                                                <div class="checkbox checkbox-primary">
                                                    <input class="todo-done published_task" {!! ($user->hasRole($role->name)) ? 'checked' : '' !!} id="access_{!! $user->id . '_' . $role->id !!}"
                                                           type="checkbox" onchange="update_user_access('{!! $user->id  !!}', '{!! $role->id  !!}')">
                                                    <label for="access_{!! $user->id . '_' . $role->id !!}" onclicktest="update_user_access('{!! $user->id  !!}', '{!! $role->id  !!}')">
                                                        {!! $role->name !!}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="padding: 0;text-align: right;">
                                <div class="icon-links quick-icon-links">
                                    <button data-toggle="tooltip" type="button" id="" title="Delete" class="btn btn icon-btn" onclick="delete_user({!! $user->id !!})">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</div>