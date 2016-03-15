@extends('backend.layout')

@section('title', 'Manage Users')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Data All Users</h5>
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
                @if ( Auth::user()->role === "admin" )
                    <a href="{{ url('/adminpanel/users/create') }}">
                        <button type="button" class="btn btn-primary pull-right"><i class="icon-diff-added position-left"></i> Add New</button>
                    </a>
                @endif
            </div>

            <table class="table table-users">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Access</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($useradmins as $useradmin)
                    <tr>
                        <td><img src="{{ asset('/assets/backend/images/users') }}{{ $useradmin->foto ? '/'.$useradmin->foto : '/placeholder.jpg'}}" class="img-circle img-sm" alt=""></td>
                        <td>{{ $useradmin->name }}</td>
                        <td>{{ $useradmin->email }}</td>
                        <td><span class="label label-success">{{ $useradmin->role }}</span></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if ( Auth::user()->role === "admin" )
                                            <li><a href="{{ url('/adminpanel/users/'.$useradmin->id.'/edit') }}"><i class="icon-pencil7 position-left"></i> Edit</a></li>
                                            @if ( Auth::user()->name !== $useradmin->name )
                                                <li><a href="{{ url('/adminpanel/users/delete/'.$useradmin->id) }}" onclick="return confirm('Are you sure you want to delete this user?');"><i class="icon-bin position-left"></i> Delete</a></li>
                                            @endif
                                        @else
                                            @if ( Auth::user()->name === $useradmin->name )
                                                <li><a href="{{ url('/adminpanel/users/'.$useradmin->id.'/edit') }}"><i class="icon-pencil7 position-left"></i> Edit</a></li>
                                            @else
                                                <li class="disabled"><a href="#"><i class="icon-accessibility position-left"></i> Access for Admin</a></li>
                                            @endif
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
        <!-- /basic datatable -->
    </div>
    <!-- /content area -->

@endsection