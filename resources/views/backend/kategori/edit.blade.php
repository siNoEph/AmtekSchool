@extends('backend.layout')

@section('title', 'Edit Kategori')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Form Edit Kategori</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                {!! Form::open(array('url' => '/adminpanel/kategori/'.$kategori->id, 'method' => 'PUT', 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Edit Kategori</legend>

                    <div class="form-group {{ $errors->has('kategori') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2 text-semibold">Kategori</label>
                        <div class="col-lg-10">
                            <input type="text" name="kategori" class="form-control" value="{{ $kategori->kategori }}" placeholder="Kategori">
                            @if ($errors->has('kategori'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('kategori') }}</strong></span>
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