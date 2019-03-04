@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit User')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('barang.update', $barang) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('merk') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Merek') }}</label>
                                    <input type="text" name="merek" id="input-merek" class="form-control form-control-alternative{{ $errors->has('merek') ? ' is-invalid' : '' }}" placeholder="{{ __('merek') }}" value="{{ $barang->merek }}" required autofocus>

                                    @if ($errors->has('merek'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('merek') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock">{{ __('Stock') }}</label>
                                    <input type="text" name="stock" id="input-stock" class="form-control form-control-alternative{{ $errors->has('stock') ? ' is-invalid' : '' }}" placeholder="{{ __('stock') }}" value="{{ $barang->stock }}" required>

                                    @if ($errors->has('stock'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stock') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('ukuran') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Ukuran') }}</label>
                                    <input type="ukuran" name="ukuran" id="input-ukuran" class="form-control form-control-alternative{{ $errors->has('ukuran') ? ' is-invalid' : '' }}" placeholder="{{ __('ukuran') }}" value="{{ $barang->ukuran }}">
                                    
                                    @if ($errors->has('ukuran'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ukuran') }}</strong>
                                        </span>
                                    @endif
                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection