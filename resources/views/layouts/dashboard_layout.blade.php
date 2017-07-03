@extends('layouts.app', ['class' => ''])

@section('main_content')

    @include('layouts.common.nav')

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="tab-content" id="ajax_content_holder">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

@stop