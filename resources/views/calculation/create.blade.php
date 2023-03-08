@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Perhitungan Karakter') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('calculation/create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="input1" class="col-md-4 col-form-label text-md-end">{{ __('Input Karakter 1') }}</label>

                            <div class="col-md-6">
                                <input id="input1" type="text" class="form-control @error('input1') is-invalid @enderror" name="input1" value="{{ old('input1') }}" required autocomplete="input1" autofocus>

                                @error('input1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="input2" class="col-md-4 col-form-label text-md-end">{{ __('Input Karakter 2') }}</label>

                            <div class="col-md-6">
                                <input id="input2" type="text" class="form-control @error('input2') is-invalid @enderror" name="input2" value="{{ old('input2') }}" required autocomplete="input2" autofocus>

                                @error('input2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Hitung') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
