@extends('backend.layout')

@section('title', 'Edit Gallery')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Gallery</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="validation-valid-label pull-left">{{ Session::get('message') }}</label>
                        <label class="validation-error-label pull-left">{{ Session::get('error') }}</label>
                    </div>
                </div>

                {!! Form::open(array('url' => '/adminpanel/gallery/'.$foto->id, 'method' => 'PUT', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Edit Foto</legend>

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                    <div class="form-group {{ $errors->has('file') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">File Foto</label>
                        <div class="col-lg-2">
                            <a href="{{ asset('/assets/gallery/'.str_slug($album->album, "_").'/'.$foto->file) }}" data-popup="lightbox">
                                <img src="{{ asset('/assets/gallery/'.str_slug($album->album, "_").'/'.$foto->file) }}" alt="" class="img-rounded img-preview">
                            </a>
                        </div>
                        <div class="col-lg-8">
                            <input type="hidden" value="{{ str_slug($album->album, "_") }}" name="album">
                            <input type="hidden" value="{{ $foto->file }}" name="old_file">
                            <input type="file" name="file" class="form-control">
                            @if ($errors->has('file'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('file') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('caption') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Caption</label>
                        <div class="col-lg-10">
                            <input type="text" name="caption" class="form-control" placeholder="Caption foto" value="{{ $foto->caption }}">
                            @if ($errors->has('caption'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('caption') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Create <i class="icon-diff-added position-right"></i></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /typeahead -->

    </div>
    <!-- /content area -->

@endsection