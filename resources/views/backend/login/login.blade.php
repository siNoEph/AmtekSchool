@extends('backend.layout')

@section('title', 'Login Adminpanel')
@section('class_page_container', 'login-container')

@section('form_login')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Simple login form -->
            {!! Form::open(array('url' => '/adminpanel/login', 'method' => 'POST')) !!}
                <div class="panel panel-body login-form">
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>

                        @if ($errors->has('email'))
                            <label class="validation-error-label">{{ $errors->first('email') }}</label>
                        @endif
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>

                        @if ($errors->has('password'))
                            <label class="validation-error-label">{{ $errors->first('password') }}</label>
                        @endif
                    </div>

                    <div class="form-group login-options">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="remember" class="styled">
                                    Remember Me
                                </label>
                            </div>

                            <div class="col-sm-6 text-right">
                                <a href="{{ url('/adminpanel/forgot') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            {!! Form::close() !!}
            <!-- /simple login form -->


            <!-- Footer -->
            <div class="footer text-muted">
                &copy; 2016. <a href="#">Amtek School App</a> by <a href="" target="_blank">Amteklab</a>
            </div>
            <!-- /footer -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->
@endsection