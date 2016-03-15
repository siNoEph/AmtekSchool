@extends('backend.layout')

@section('title', 'Article')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Article</h5>
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
                        <a href="{{ url('/adminpanel/article/create') }}">
                            <button type="button" class="btn btn-primary pull-right"><i class="icon-diff-added position-left"></i> Add New</button>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-article table-lg">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Video</th>
                        <th>Title</th>
                        <th>Kategori</th>
                        <th>Author</th>
                        <th>Update Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>
                                @if($article->image)
                                    <a href="{{ asset('/assets/article/'.$article->image) }}" data-popup="lightbox">
                                        <img src="{{ asset('/assets/article/'.$article->image) }}" alt="" class="img-rounded img-preview">
                                    </a>
                                @else
                                    Image not available
                                @endif
                            </td>
                            <td>
                                @if(!$article->video)
                                    <img src="http://img.youtube.com/vi/mGUTs3vxSAg/0.jpg" alt="" class="img-rounded img-preview" data-toggle="modal" data-target="#modal_video{{ $article->id }}">

                                    <!-- Basic modal -->
                                    <div id="modal_video{{ $article->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">                                                
                                                    <div class="video-container">
                                                        <iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="http://www.youtube.com/embed/mGUTs3vxSAg?autoplay=0" webkitallowfullscreen=""></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /basic modal -->
                                @else
                                    Video not available
                                @endif
                            </td>
                            <td class="text-semibold">{{ $article->title }}</td>
                            <td>{{ $article->kategori }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ date('F d, Y', strtotime($article->updated_at)) }}</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="#"><i class="icon-pencil7"></i> Edit Article</a></li>
                                            <li><a href="{{ url('/adminpanel/article/delete/'.$article->id) }}" onclick="return confirm('Are you sure you want to delete this article?');"><i class="icon-bin"></i> Delete Foto</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /typeahead -->

    </div>
    <!-- /content area -->

@endsection