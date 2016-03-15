@extends('backend.layout')

@section('title', 'Adminpanel')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Dashboard content -->
        <div class="row">

            <div class="col-lg-8">

                <!-- Quick stats boxes -->
                <div class="row">

                    <div class="col-lg-12">
                        <label class="validation-valid-label">{{ Session::get('status') }}</label>
                    </div>

                    <div class="col-lg-4">

                        <!-- Members online -->
                        <div class="panel bg-teal-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <span class="heading-text badge bg-teal-800">+53,6%</span>
                                </div>

                                <h3 class="no-margin">3,450</h3>
                                Members online
                                <div class="text-muted text-size-small">489 avg</div>
                            </div>

                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                        <!-- /members online -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Current server load -->
                        <div class="panel bg-pink-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                                <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                                <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                                <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <h3 class="no-margin">49.4%</h3>
                                Current server load
                                <div class="text-muted text-size-small">34.6% avg</div>
                            </div>

                            <div id="server-load"></div>
                        </div>
                        <!-- /current server load -->

                    </div>

                    <div class="col-lg-4">

                        <!-- Today's revenue -->
                        <div class="panel bg-blue-400">
                            <div class="panel-body">
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="reload"></a></li>
                                    </ul>
                                </div>

                                <h3 class="no-margin">$18,390</h3>
                                Today's revenue
                                <div class="text-muted text-size-small">$37,578 avg</div>
                            </div>

                            <div id="today-revenue"></div>
                        </div>
                        <!-- /today's revenue -->

                    </div>

                </div>
                <!-- /quick stats boxes -->

            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">

                        <!-- Table Kategori -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">List Kategori</h6>
                                <div class="heading-elements">
                                    {!! Form::open(array('url' => '/adminpanel/kategori', 'method' => 'POST', 'class'=>'control-group form-group')) !!}
                                        <div class="control-group form-group">
                                            <div class="editable-input">
                                                <input type="text" name="kategori" class="form-control" placeholder="Add New Kategori">
                                            </div>
                                            <div class="editable-buttons">
                                                <button type="submit" class="btn btn-primary btn-icon editable-submit"><i class="icon-diff-added position-left"></i> Add</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <label class="validation-valid-label">{{ Session::get('message_kategori') }}</label>
                                <label class="validation-error-label">{{ Session::get('error_kategori') }}</label>
                                @if ($errors->has('kategori'))
                                    <label class="validation-error-label">{{ $errors->first('kategori') }}</label>
                                @endif
                            </div>

                            <table class="table table-kategori">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $kategori->kategori }}</td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="{{ url('/adminpanel/kategori/'.$kategori->id.'/edit') }}"><i class="icon-pencil7 position-left"></i> Edit</a></li>
                                                        <li><a href="{{ url('/adminpanel/kategori/delete/'.$kategori->id) }}" onclick="return confirm('Are you sure you want to delete this kategori?');"><i class="icon-bin position-left"></i> Delete</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /Table Kategori -->

                    </div>

                    <div class="col-lg-6">

                        <!-- Table Kategori -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">List Pages</h6>
                                <div class="heading-elements">
                                    <a href="{{ url('/adminpanel/pages/create') }}">
                                        <button type="submit" class="btn btn-primary btn-icon editable-submit"><i class="icon-diff-added position-left"></i> Add New</button>
                                    </a>
                                </div>
                                <label class="validation-valid-label">{{ Session::get('message_page') }}</label>
                                <label class="validation-error-label">{{ Session::get('error_page') }}</label>
                                @if ($errors->has('page'))
                                    <label class="validation-error-label">{{ $errors->first('page') }}</label>
                                @elseif ($errors->has('text'))
                                    <label class="validation-error-label">{{ $errors->first('text') }}</label>
                                @endif
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
                        <!-- /Table Kategori -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2016. <a href="#">Amtek School App</a> by <a href="" target="_blank">Amteklab</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->
@endsection