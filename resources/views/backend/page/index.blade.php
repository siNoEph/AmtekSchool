@extends('backend.layout')

@section('title', 'Manage Pages')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Data All Pages</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <label class="validation-valid-label pull-left">{{ Session::get('message') }}</label>
                <label class="validation-error-label pull-left">{{ Session::get('error') }}</label>
                <a href="{{ url('/adminpanel/pages/create') }}">
                    <button type="button" class="btn btn-primary pull-right"><i class="icon-diff-added position-left"></i> Add New</button>
                </a>
            </div>

            <table class="table table-pages">
                <thead>
                    <tr>
                        <th>Page</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->page }}</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('/adminpanel/pages/'.$page->id.'/edit') }}"><i class="icon-pencil7 position-left"></i> Edit</a></li>
                                        <li><a href="{{ url('/adminpanel/pages/delete/'.$page->id) }}" onclick="return confirm('Are you sure you want to delete this page?');"><i class="icon-bin position-left"></i> Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic datatable -->
    </div>
    <!-- /content area -->

@endsection