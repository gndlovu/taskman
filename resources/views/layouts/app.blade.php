<!DOCTYPE html>
<html class="{!! $class !!}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Synrgise - Innovate Learning') }}</title>

        {!! Html::style(url('css/bootstrap.min.css')) !!}
        {!! Html::style(url('css/core.css')) !!}
        {!! Html::style(url('css/icons.css')) !!}
        {!! Html::style(url('css/components.css')) !!}
        {!! Html::style(url('css/pages.css')) !!}
        {!! Html::style(url('css/menu.css')) !!}
        {!! Html::style(url('css/responsive.css')) !!}
        {!! Html::style(url('css/elements.css')) !!}
        {!! Html::style(url('css/toastr.css')) !!}
        {!! Html::style(url('css/sweetalert.css')) !!}

        @stack('style')

        {!! Html::script(url('js/modernizr.min.js')) !!}
        {!! Html::script(url('js/jquery.min.js')) !!}
        {!! Html::script(url('js/jquery.blockUI.js')) !!}

    </head>
    <body>

        @yield('main_content')

        <script type="text/javascript">
            var base_url = "{!! url('') !!}";
            var _token = "{{ csrf_token() }}";
            var resizefunc = [];

            window.onbeforeunload = function(e)
            {
                //baseZ: 999999999
                $.blockUI({message: '<img src="{!! asset('images/loader.gif') !!}">', css: {backgroundColor: 'transparent', border: 'none', cursor: 'wait'}, baseZ: 999999999});
            };

            $(document).ajaxStart(function()
            {
                $.blockUI({message: '<img src="{!! asset('images/loader.gif') !!}">', css: {backgroundColor: 'transparent', border: 'none', cursor: 'wait'}, baseZ: 9999});
            }).ajaxStop(function()
            {
                $.unblockUI();
            });

        </script>

        {!! Html::script(url('js/bootstrap.min.js')) !!}
        {!! Html::script(url('js/toastr.min.js')) !!}
        {!! Html::script(url('js/sweetalert.min.js')) !!}
        {!! Html::script(url('js/custom.js')) !!}

        @stack('scripts')

    </body>
</html>
