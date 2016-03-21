@extends('backend.layout')

@section('title', 'List Album')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Typeahead -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">List Album</h5>
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
            </div>

            <table class="table table-striped table-album table-lg">
                <thead>
                    <tr>
                        <th>Album</th>
                        <th>Kategori</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->album }}</td>
                            <td>{{ $album->kategori }}</td>
                            <td>{{ str_limit($album->desc, 50) }}</td>
                            <td>{{ date('F d, Y', strtotime($album->updated_at)) }}</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('/adminpanel/album/addFoto/'.$album->id) }}"><i class="icon-diff-added"></i> Add Foto</a></li>
                                            <li><a href="{{ url('/adminpanel/album/'.$album->id.'/edit') }}"><i class="icon-pencil7"></i> Edit Album</a></li>
                                            @if ( Auth::user()->role === "admin" )
                                            <li><a href="{{ url('/adminpanel/gallery/delete/'.$album->id) }}" onclick="return confirm('Are you sure you want to delete this album?');"><i class="icon-bin"></i> Delete Album</a></li>
                                            @endif
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