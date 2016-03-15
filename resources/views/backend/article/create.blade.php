@extends('backend.layout')

@section('title', 'Create Article')

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

	<!-- Content area -->
    <div class="content">
		
		<!-- Summernote click to edit -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Create Article</h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				{!! Form::open(array('url' => '/adminpanel/article', 'method' => 'POST', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
				
				<fieldset class="content-group">
                    <legend class="text-bold">Data Article</legend>

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                    <div class="form-group {{ $errors->has('image') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Image Article</label>
                        <div class="col-lg-10">
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('video') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Link Video</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="video" value="{{ old('video') }}" placeholder="Link Video Article">
                            @if ($errors->has('video'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('video') }}</strong></span>
                            @endif
                        </div>
                    </div>

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

                    <div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Title Article</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title Article">
                            @if ($errors->has('title'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('text') ? 'has-error has-feedback' : '' }}">
                        <div class="col-lg-12">
			                <textarea id="textNewArticle" name="text" placeholder="Text Article">
								{!! old('text') !!}
							</textarea>
                            @if ($errors->has('text'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
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
		<!-- /summernote click to edit -->
    </div>
    <!-- /content area -->

@endsection