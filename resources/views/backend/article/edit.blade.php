@extends('backend.layout')

@section('title', 'Edit Article')

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

	<!-- Content area -->
    <div class="content">
		
		<!-- Summernote click to edit -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Edit Article</h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				{!! Form::open(array('url' => '/adminpanel/article/'.$article->id, 'method' => 'Put', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
				
				<fieldset class="content-group">
                    <legend class="text-bold">Data Article</legend>

                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                    <div class="form-group {{ $errors->has('image') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Image Article</label>
                        <div class="col-lg-2">
                            @if($article->image)
                                <a href="{{ asset('/assets/articles/'.$article->image) }}" data-popup="lightbox">
                                    <img src="{{ asset('/assets/articles/'.$article->image) }}" alt="" class="img-rounded img-preview">
                                </a>
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <input type="hidden" value="{{ $article->image }}" name="old_image">
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
                        <div class="col-lg-2">
                            <img src="http://img.youtube.com/vi/{{ $article->video }}/0.jpg" alt="" class="img-rounded img-preview" data-toggle="modal" data-target="#modal_video{{ $article->id }}">

                            <!-- Basic modal -->
                            <div id="modal_video{{ $article->id }}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">                                                
                                            <div class="video-container">
                                                <iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="http://www.youtube.com/embed/{{ $article->video }}?autoplay=0" webkitallowfullscreen=""></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /basic modal -->
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="video" value="{{ $article->video }}" placeholder="Link Video Article">
                            @if ($errors->has('video'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('video') }}</strong></span>
                            @else
                                <span class="help-block">Isi field ini dengan id video Youtube</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('kategori') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-10">
                            <select name="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ ($article->id_kategori == $kategori->id) ? 'selected="selected"' : '' }}>{{ $kategori->kategori }}</option>
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
                            <input type="text" class="form-control" name="title" value="{{ $article->title }}" placeholder="Title Article">
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
								{!! $article->text !!}
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