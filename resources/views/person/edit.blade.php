@extends('layouts.site')

@section('content')

<div class="right_col" role="main">

    <div class="row justify-content-center">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ __('Добавление персонал') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-12 col-md-12" style="">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('person.update', $person->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="fullname" class="col-md-4 col-form-label text-md-right">{{ __('Ф.И.О') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="fullname" class="form-control" id="fullname" required value="{{ $person->fullname ?? old('fullname')}}"  autocomplete="off">
                                    @if( $errors->has('fullname'))
                                        <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Дата рождение') }}</label>
                                <div class="col-md-6">
                                    <input type="date" name="birthdate" class="form-control" id="birthdate" required value="{{ $person->birthdate ?? old('birthdate')}}"  autocomplete="off">
                                    @if( $errors->has('birthdate'))
                                        <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" id="email" required value="{{ $person->email ?? old('email')}}"  autocomplete="off">
                                    @if( $errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Город') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="city" class="form-control" id="city" required value="{{ $person->address['city'] ??  old('city')}}"  autocomplete="off">
                                    @if( $errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Район') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="region" class="form-control" id="region" required value="{{ $person->address['region'] ?? old('region')}}"  autocomplete="off">
                                    @if( $errors->has('region'))
                                        <span class="text-danger">{{ $errors->first('region') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Улица') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="street" class="form-control" id="street" required value="{{ $person->address['street'] ?? old('street')}}"  autocomplete="off">
                                    @if( $errors->has('street'))
                                        <span class="text-danger">{{ $errors->first('street') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="home" class="col-md-4 col-form-label text-md-right">{{ __('Квартира') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="home" class="form-control" id="home" required value="{{ $person->address['home'] ?? old('home')}}"  autocomplete="off">
                                    @if( $errors->has('home'))
                                        <span class="text-danger">{{ $errors->first('home') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Компания') }}</label>
                                <div class="col-md-6">
                                    <select name="company_id" class="form-control" required>
                                    @foreach( App\Models\Company::all() as $company )
                                        <option value="{{ $company->id }}" {{ $company->id == $person->company_id ? 'selected':'' }}>{{ $company->name }}</option>
                                    @endforeach
                                    </select>
                                    @if( $errors->has('company_id'))
                                        <span class="text-danger">{{ $errors->first('company_id') }}</span>
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





           