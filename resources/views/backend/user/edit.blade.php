@extends('backend.layout')

@section('title', 'Edit User')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Form Edit User</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                {!! Form::open(array('url' => '/adminpanel/users/'.$useradmin->id, 'method' => 'PUT', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Edit User Admin</legend>

                    <div class="form-group {{ $errors->has('foto') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Foto User</label>
                        <div class="col-lg-1">
                            <img src="{{ asset('/assets/backend/images/users') }}{{ $useradmin->foto ? '/'.$useradmin->foto : '/placeholder.jpg'}}" class="img-circle img-sm" alt="">
                        </div>
                        <div class="col-lg-9">
                            <input type="hidden" value="{{ $useradmin->foto }}" name="old_foto">
                            <input type="file" name="foto" class="form-control">
                            @if ($errors->has('foto'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('foto') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" value="{{ $useradmin->name }}" placeholder="Name User Admin">
                            @if ($errors->has('name'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" value="{{ $useradmin->email }}" placeholder="Email to Login">
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Confirm Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            @if ($errors->has('password_confirmation'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('role') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Access</label>
                        <div class="col-lg-10">
                            <select name="role" class="form-control">
                                <option value="admin" {{ ($useradmin->role == 'admin') ? 'selected="selected"' : '' }}>Admin</option>
                                <option value="author" {{ ($useradmin->role == 'author') ? 'selected="selected"' : '' }}>Author</option>
                            </select>
                            @if ($errors->has('role'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('role') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Edit <i class="icon-pencil7 position-right"></i></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

@endsection