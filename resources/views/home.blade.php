@extends('layouts.dashboard_layout')

@section('content')

    {{--    @include('tasks.published_tasks') --}}

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function ()
    {
        get_task_list('published_tasks'); /*Show published tasks by default*/
    });
</script>
@endpush
