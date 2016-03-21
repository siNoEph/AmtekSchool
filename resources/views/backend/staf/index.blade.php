@extends('backend.layout')

@section('title', 'Data Staf')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Data All Staf</h5>
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
                <a href="{{ url('/adminpanel/staf/create') }}">
                    <button type="button" class="btn btn-primary pull-right"><i class="icon-diff-added position-left"></i> Add New</button>
                </a>
            </div>

            <table class="table table-users">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Tempat, Tgl. Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Tugas Pokok</th>
                        <th>Agama</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stafs as $staf)
                    <tr>
                        <td><img src="{{ asset('/assets/staf') }}{{ $staf->foto ? '/'.$staf->foto : '/placeholder.jpg'}}" class="img-circle img-sm" alt=""></td>
                        <td>{{ $staf->nip }}</td>
                        <td>{{ $staf->nama }}</td>
                        <td>{{ $staf->tmp_lahir }}, {{ date('d F Y', strtotime($staf->tgl_lahir)) }}</span></td>
                        <td>{{ $staf->jenis_kelamin == 0 ? 'Perempuan' : 'Laki-laki' }}</td>
                        <td>{{ $staf->jabatan }}</td>
                        <td>{{ $staf->tugas_pokok }}</td>
                        <td>{{ $staf->agama }}</td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('/adminpanel/staf/'.$staf->id.'/edit') }}"><i class="icon-pencil7 position-left"></i> Edit</a></li>
                                        @if ( Auth::user()->role === "admin" )
                                            <li><a href="{{ url('/adminpanel/staf/delete/'.$staf->id) }}" onclick="return confirm('Are you sure you want to delete this staf?');"><i class="icon-bin position-left"></i> Delete</a></li>
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