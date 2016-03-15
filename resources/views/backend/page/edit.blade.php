@extends('backend.layout')

@section('title', 'Edit Page')

@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

	<!-- Content area -->
    <div class="content">
		
		<!-- Summernote click to edit -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Edit Page</h5>
				<div class="heading-elements">
					<ul class="icons-list">
                		<li><a data-action="collapse"></a></li>
                		<li><a data-action="reload"></a></li>
                		<li><a data-action="close"></a></li>
                	</ul>
            	</div>
			</div>

			<div class="panel-body">
				{!! Form::open(array('url' => '/adminpanel/pages/'.$page->id, 'method' => 'PUT', 'class'=>'form-horizontal', 'role'=>'form')) !!}
				
				<fieldset class="content-group">
                    <div class="form-group {{ $errors->has('page') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Page</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="page" value="{{ $page->page }}" placeholder="Page">
                            @if ($errors->has('page'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('page') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('text') ? 'has-error has-feedback' : '' }}">
                        <div class="col-lg-12">
			                <textarea id="textPage" name="text" placeholder="Keterangan Page">
								{!! $page->text !!}
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
                    <button type="submit" class="btn btn-primary">Edit <i class="icon-pencil7 position-right"></i></button>
                </div>

				{!! Form::close() !!}
			</div>
		</div>
		<!-- /summernote click to edit -->
    </div>
    <!-- /content area -->

@endsection