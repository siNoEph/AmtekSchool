@extends('backend.layout')

@section('title', 'Reset Password')
@section('class_page_container', 'login-container')

@section('form_reset_pass')

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <!-- Password recovery -->
            {!! Form::open(array('url' => '/adminpanel/forgot', 'method' => 'POST')) !!}
                <div class="panel panel-body login-form">
                    <div class="text-center">
                        <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                        <h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
                    </div>

                    @if (session('status'))
                        <label class="validation-valid-label">{{ session('status') }}</label>
                    @endif

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address">
                        <div class="form-control-feedback">
                            <i class="icon-mail5 text-muted"></i>
                        </div>
                        @if ($errors->has('email'))
                            <label class="validation-error-label">{{ $errors->first('email') }}</label>
                        @endif
                    </div>

                    <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button><br>
                </div>
            {!! Form::close() !!}
            <!-- /password recovery -->

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