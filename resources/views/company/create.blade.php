@extends('layouts.site')





@section('content')

<div class="right_col" role="main">

    <div class="row justify-content-center">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ __('Добавление компании') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-12 col-md-4" style="">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Chiqish vaqti') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" id="name" required value="{{ old('name')}}"  autocomplete="off">
                                    @if( $errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Добавить') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  




           