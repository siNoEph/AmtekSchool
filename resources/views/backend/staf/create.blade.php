@extends('backend.layout')

@section('title', 'Create Staf')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Form Create Staf</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                {!! Form::open(array('url' => '/adminpanel/staf', 'method' => 'POST', 'files'=>true, 'class'=>'form-horizontal', 'role'=>'form')) !!}
                <fieldset class="content-group">
                    <legend class="text-bold">Data Staf</legend>

                    <div class="form-group {{ $errors->has('foto') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                            <input type="file" name="foto" class="form-control">
                            @if ($errors->has('foto'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('foto') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('nip') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">NIP</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" name="nip" value="{{ old('nip') }}" placeholder="Nomer Induk Pegawai">
                            @if ($errors->has('nip'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('nip') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('nama') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama Staf">
                            @if ($errors->has('nama'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('nama') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Tempat lahir</label>
                        <div class="col-lg-4 {{ $errors->has('tmp_lahir') ? 'has-error has-feedback' : '' }}">
                            <input type="text" class="form-control" name="tmp_lahir" value="{{ old('tmp_lahir') }}" placeholder="Tempat lahir">
                            @if ($errors->has('tmp_lahir'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('tmp_lahir') }}</strong></span>
                            @endif
                        </div>
                        <label class="control-label col-lg-2">Tanggal lahir</label>
                        <div class="col-lg-4 {{ $errors->has('tgl_lahir') ? 'has-error has-feedback' : '' }}">
                            <input type="text" class="form-control pickadate" name="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="Tanggal Lahir">
                            @if ($errors->has('tgl_lahir'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('tgl_lahir') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Jenis Kelamin</label>
                        <div class="col-lg-4 {{ $errors->has('jenis_kelamin') ? 'has-error has-feedback' : '' }}">
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="0">Perempuan</option>
                                <option value="1">Laki-laki</option>
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('jenis_kelamin') }}</strong></span>
                            @endif
                        </div>
                        <label class="control-label col-lg-2">Agama</label>
                        <div class="col-lg-4 {{ $errors->has('agama') ? 'has-error has-feedback' : '' }}">
                            <select name="agama" class="form-control">
                                <option value="">Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="katolik">Katolik</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                            </select>
                            @if ($errors->has('agama'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('agama') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('jabatan') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Jabatan</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" placeholder="Jabatan">
                            @if ($errors->has('jabatan'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('jabatan') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('tugas_pokok') ? 'has-error has-feedback' : '' }}">
                        <label class="control-label col-lg-2">Tugas Pokok</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="tugas_pokok" value="{{ old('tugas_pokok') }}" placeholder="Tugas Pokok">
                            @if ($errors->has('tugas_pokok'))
                                <div class="form-control-feedback">
                                    <i class="icon-cancel-circle2"></i>
                                </div>
                                <span class="help-block"><strong>{{ $errors->first('tugas_pokok') }}</strong></span>
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
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

@endsection