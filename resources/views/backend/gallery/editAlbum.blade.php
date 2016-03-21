@extends('backend.layout')

@section('title', 'Edit Album')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Album</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                {!! Form::open(array('url' => '/adminpanel/album/'.$album->id, 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Data Album</legend>

                    <div class="form-group {{ $errors->has('kategori') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                            <select name="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ ($album->id_kategori == $kategori->id) ? 'selected="selected"' : '' }}>{{ $kategori->kategori }}</option>
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
                            <input type="text" name="album" class="form-control" placeholder="New Album" value="{{ $album->album }}">
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
                            <textarea rows="5" cols="5" class="form-control" name="desc" placeholder="Description Album">{{ $album->desc }}</textarea>
                            @if ($errors->has('desc'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('desc') }}</strong></span>
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
        <!-- /typeahead -->

    </div>
    <!-- /content area -->

@endsection