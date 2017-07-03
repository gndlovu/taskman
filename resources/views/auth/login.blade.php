@extends('layouts.public_layout')

@section('content')

    <div class="wrapper-page">
        <div class="panel-pages login">
            <div class="panel-body">
                <div class="logo text-center m-b-20">
                    <a href="#"><img src="{!! url('images/synrgise-logo-white.png') !!}"></a>
                </div>
                <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" required="" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>
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
                        <div class="col-xs-12 col-md-8">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="checkbox-signup" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <button class="btn btn-black btn-block waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="#"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="{!! url('register') !!}">Create an account</a>
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
@endpush