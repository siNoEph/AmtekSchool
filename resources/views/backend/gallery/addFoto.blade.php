@extends('backend.layout')

@section('title', 'Add Foto Album')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add Foto Album</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                {!! Form::open(array('url' => '/adminpanel/album/storeFoto/'.$album->id, 'method' => 'POST', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Add Foto</legend>

                    <input type="hidden" name="id_album" value="{{ $album->id }}">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="album" value="{{ $album->album }}">

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
                    <button type="submit" class="btn btn-primary">Add <i class="icon-diff-added position-right"></i></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /typeahead -->

    </div>
    <!-- /content area -->

@endsection