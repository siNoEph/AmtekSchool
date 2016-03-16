@extends('backend.layout')

@section('title', 'Gallery')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Gallery</h5>
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
                        <a href="{{ url('/adminpanel/gallery/create') }}">
                            <button type="button" class="btn btn-primary pull-right"><i class="icon-diff-added position-left"></i> Add New</button>
                        </a>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-gallery table-lg">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Album</th>
                        <th>Caption</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fotos as $foto)
                        <tr>
                            <td>
                                <a href="{{ asset('/assets/gallery/'.str_slug($foto->album, "_").'/'.$foto->file) }}" data-popup="lightbox">
                                    <img src="{{ asset('/assets/gallery/'.str_slug($foto->album, "_").'/'.$foto->file) }}" alt="" class="img-rounded img-preview">
                                </a>
                            </td>
                            <td>
                                <ul class="list-condensed list-unstyled no-margin">                                                 
                                    <li class="text-semibold">{{ $foto->album }}</li>
                                    @if ( Auth::user()->role === "admin" )
                                        <li><a href="{{ url('/adminpanel/gallery/delete/'.$foto->id_album) }}" onclick="return confirm('Are you sure you want to delete this album?');"><span class="label label-danger"><i class="icon-bin"></i> Delete Album</span></a></li>
                                    @endif
                                </ul>
                            </td>
                            <td>{{ $foto->caption }}</td>
                            <td>{{ $foto->name }}</td>
                            <td>{{ date('F d, Y', strtotime($foto->updated_at)) }}</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('/adminpanel/gallery/'.$foto->id.'/edit') }}"><i class="icon-pencil7"></i> Edit foto</a></li>
                                            <li><a href="{{ url('/adminpanel/gallery/deleteFoto/'.$foto->id.'/'.$foto->file.'/'.$foto->id_album) }}" onclick="return confirm('Are you sure you want to delete this foto?');"><i class="icon-bin"></i> Delete Foto</a></li>
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