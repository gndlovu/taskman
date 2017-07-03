jQuery.extend({
    doAJAX: function (url, data, type, callback)
    {
        if (type.toLowerCase() != "get")
        {
            data["_token"] = _token;
        }

        if (!type)
        {
            type = "GET";
        }

        return $.ajax({
            type: type,
            url: url,
            data: data,
            dataType: "json",
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                notify('error', "Error Code: " + XMLHttpRequest.status + " : " + XMLHttpRequest.statusText);
            },
            success: function (data)
            {
                callback(data);
            }
        });
    }
});

function notify(type, msg, title, time_out)
{
    toastr.options = {
        "closeButton": true,
        "closeHtml": "<i class='glyphicon glyphicon-remove-sign'></i>",
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": (time_out != undefined) ? time_out : 2000,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    toastr[type](msg, title);
}

function get_task_list(task_type)
{
    $.doAJAX(base_url + '/get_task_list/' + task_type, {}, 'GET', function (response)
    {
        if (response.status == true)
        {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li.' + task_type).addClass('active');

            $("#ajax_content_holder").fadeOut('slow').empty().append(response.content).fadeIn('slow');

            if (!response.total_tasks)
            {
                notify("warning", "No records found, Please try again later!", '', 3000);
            }
        }
        else
        {
            notify("error", response.error_description, "", 5000);
        }
    });

    return false;
}

function mark_as_completed()
{
    var completed_tasks = [];

    $('input.published_task').each(function ()
    {
        if (this.checked)
        {
            completed_tasks.push($(this).attr('id'));
        }
    });

    if (completed_tasks.length === 0)
    {
        notify("warning", "Please select at-least one task to continue!", '', 5000);
        return false;
    }

    swal({
            title: "Are you sure?",
            text: "Please note all selected tasks will be marked as completed!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true
        },
        function ()
        {
            $.doAJAX(base_url + '/mark_as_completed', {'completed_tasks': completed_tasks}, 'PUT', function (response)
            {
                if (response.status == true)
                {
                    get_task_list('published_tasks');
                }
                else
                {
                    notify("error", response.error_description, "", 5000);
                }
            });
        });

    return false;
}

function get_task_form(task_id)
{
    $.doAJAX(base_url + '/get_task_form/' + task_id, {}, 'GET', function (response)
    {
        if (response.status == true)
        {
            $("#ajax_content_holder").fadeOut('slow').empty().append(response.content).fadeIn('slow');
        }
        else
        {
            notify("error", response.error_description, "", 5000);
        }
    });

    return false;
}

function submit_task_form(task_id)
{
    var error_cnt = 0;
    var action;
    var method;
    var data = {};

    if (task_id)
    {
        method = 'PUT';
        action = "update_task";
        data['task_id'] = task_id;
    }
    else
    {
        method = 'POST';
        action = "add_task";
    }

    $("form#task_form .form-control").each(function ()
    {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).next('span').replaceWith('');

        if (!this.value)
        {
            if (this.name == 'title' || this.name == 'description' || this.name == 'due_date')
            {
                $(this).closest('.form-group').addClass('has-error');
                $(this).closest('.form-group').append('<span class="help-block">Provide a value for this field!</span>');
                error_cnt++;
            }
        }

        data[this.name] = this.value;
    });

    if (error_cnt)
    {
        return false;
    }

    $.doAJAX(base_url + '/' + action, {data: data}, method, function (response)
    {
        if (response.status == true)
        {
            notify("success", 'Task details successfully saved!', "", 10000);
            get_task_list('manage_tasks');
        }
    });

    return false;
}

function publish_unpublish_task(obj)
{
    var task_id = obj.attr('task_id');
    var published = obj.attr('published');
    var icon = (published == 1) ? '<i class="fa fa-play"></i>' : '<i class="fa fa-stop"></i>';

    $.doAJAX(base_url + '/publish_unpublish_task', {'task_id': task_id, 'published': published}, 'PUT', function (response)
    {
        if (response.status == true)
        {
            obj.html(icon);
            obj.attr('published', (published == 1) ? 0 : 1);
            obj.attr('title', (published == 1) ? 'Publish' : 'Unpublish');
        }
        else
        {
            notify("error", response.error_description, "", 5000);
        }
    });

    return false;
}

function delete_task(task_id)
{
    var extra = (task_id == 'all') ? "all tasks" : "this task";
    swal({
            title: "Are you sure?",
            text: "Please note " + extra + " will be deleted and this cannot be undone!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true
        },
        function ()
        {
            $.doAJAX(base_url + '/delete_task/' + task_id, {}, 'DELETE', function (response)
            {
                if (response.status == true)
                {
                    get_task_list('completed_tasks');
                }
                else
                {
                    notify("error", response.error_description, "", 5000);
                }
            });
        });

    return false;
}

function get_user_list(which_view)
{
    which_view = (which_view) ? which_view : 'list_view';
    $.doAJAX(base_url + '/get_user_list/' + which_view, {}, 'GET', function (response)
    {
        if (response.status == true)
        {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li.user_maintenance').addClass('active');

            $("#ajax_content_holder").fadeOut('slow').empty().append(response.content).fadeIn('slow');

            if (!response.total_users)
            {
                notify("warning", "No records found, Please try again later!", '', 3000);
            }
        }
        else
        {
            notify("error", response.error_description, "", 5000);
        }
    });

    return false;
}

function update_user_access(user_id, role_id)
{
    var grant_access = ($('input#access_' + user_id + "_" + role_id).is(':checked')) ? 1 : 0;

    $.doAJAX(base_url + '/update_user_access', {'user_id': user_id, 'role_id': role_id, 'grant_access': grant_access}, 'PUT', function (response)
    {
        if (response.status == true)
        {
            /*Could notify them here!!*/
        }
        else
        {
            notify("error", response.error_description, "", 5000);
        }
    });

    return false;
}

function delete_user(user_id)
{
    var extra = (user_id == 'all') ? "All users" : "This user";

    swal({
            title: "Are you sure?",
            text: extra + " will be deleted and this cannot be undone!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true
        },
        function ()
        {
            $.doAJAX(base_url + '/delete_user/' + user_id, {}, 'DELETE', function (response)
            {
                if (response.status == true)
                {
                    get_user_list();
                }
                else
                {
                    notify("error", response.error_description, "", 5000);
                }
            });
        });

    return false;
}