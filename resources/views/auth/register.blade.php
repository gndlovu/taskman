@extends('layouts.public_layout')

@section('content')

    <div class="wrapper-page">
        <div class="panel-pages login">
            <div class="panel-body">
                <div class="logo text-center m-b-20">
                    <a href="#"><img src="{!! url('images/synrgise-logo-white.png') !!}"></a>
                </div>
                <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                            {{--@if ($errors->has('name'))--}}
                                {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('name') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" name="surname" placeholder="Surname" value="{{ old('surname') }}" required>
                            {{--@if ($errors->has('name'))--}}
                            {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('name') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                            {{--@if ($errors->has('email'))--}}
                                {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('email') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="password" placeholder="Password" required>
                            {{--@if ($errors->has('password'))--}}
                                {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="password_confirmation" placeholder="Password confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-md-8 text-info">
                            Already have an account? <a href="{!! url('login') !!}">Login</a>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <button class="btn btn-black btn-block waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@if ($errors->has('email'))
    <script>
        notify("warning", "{{ $errors->first('email') }}", '', 10000);
    </script>
@endif

@if ($errors->has('password'))
    <script>
        notify("warning", "{{ $errors->first('password') }}", '', 10000);
    </script>
@endif
@endpush
