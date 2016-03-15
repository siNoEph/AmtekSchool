@extends('backend.layout')

@section('title', 'Create Gallery')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Create Gallery</h5>
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

                {!! Form::open(array('url' => '/adminpanel/gallery', 'method' => 'POST', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Data Gallery</legend>

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                    <div class="form-group {{ $errors->has('kategori') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                            <select name="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kategori'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('kategori') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('album') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Album</label>
                        <div class="col-lg-10">
                            <input type="text" name="album" class="form-control" placeholder="New Album" value="{{ old('album') }}">
                            @if ($errors->has('album'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('album') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('desc') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="5" cols="5" class="form-control" name="desc" placeholder="Description Album">{{ old('desc') }}</textarea>
                            @if ($errors->has('desc'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('desc') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('foto') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Foto - foto Album</label>
                        <div class="col-lg-10">
                            {!! Form::file('foto[]', array('multiple'=>true, 'class'=>'form-control')) !!}
                            @if ($errors->has('foto'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('foto') }}</strong></span>
                            @else
                                <span class="help-block">Fungsi ini dapat meng upload foto lebih dari 1 dengan menekan tombol CTRL</span>
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