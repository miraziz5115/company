@extends('layouts.site')

@section('content')

<div class="right_col" role="main">

    <div class="row justify-content-center">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ __('Добавление компании') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-12 col-md-12" style="">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.update', $company->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-md-12">
                                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Название компания') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" id="name" required value="{{ $company->name ?? old('name')}}"  autocomplete="off" data-id="{{ $company->id }}">
                                    @if( $errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                 <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Изменить') }}
                                    </button>
                                </div>

                            </div>
                            
                        </form>

                        {{--    <div class="form-group row">
                                <label for="default_person_id" class="col-md-4 col-form-label text-md-right">{{ __('Контактное лицо по умолчанию') }}</label>
                                <div class="col-md-6">
                                    <select name="default_person_id" class="form-control" required>
                                        <option selected disabled>{{ $company->defaultPerson['fullname'] ?? 'Выберите'}}</option>
                                    @foreach( App\Models\Person::all() as $person )
                                        <option value="{{ $person->id }}">{{ $person->fullname }}</option>
                                    @endforeach
                                    </select>
                                    @if( $errors->has('default_person_id'))
                                        <span class="text-danger">{{ $errors->first('default_person_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        --}}
                        <h2>Контактное лицо по умолчанию</h2>
                            <table class="table table-bordered">
                            <tr>
                                <th width="10">№</th>
                                <th>Ф.И.О</th>
                                <th>E-mail</th>
                                <th>Дата рождение</th>
                                <th>Город</th>
                                <th>Район</th>
                                <th>Улица</th>
                                <th>Квартира</th>
                            </tr>
                            @php $i = 1 @endphp
                            @foreach( $company->persons as $default_person )
                                @if( $default_person->id == $company->default_person)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $default_person->fullname }}</td>
                                        <td>{{ $default_person->email }}</td>
                                        <td>{{ $default_person->birthdate }}</td>
                                        <td>{{ $default_person->address['city'] }}</td>
                                        <td>{{ $default_person->address['region'] }}</td>
                                        <td>{{ $default_person->address['street'] }}</td>
                                        <td>{{ $default_person->address['home'] }}</td>
                                    </tr>
                                    @php $i++ @endphp
                                @endif
                            @endforeach
                        </table>
                        <h2>Сотрудники компании</h2>
                        <table class="table table-bordered">
                            <tr>
                                <th width="10">№</th>
                                <th>Ф.И.О</th>
                                <th>E-mail</th>
                                <th>Дата рождение</th>
                                <th>Город</th>
                                <th>Район</th>
                                <th>Улица</th>
                                <th>Квартира</th>
                                <th>Контактное лицо по умолчанию</th>
                            </tr>
                            @php $i = 1 @endphp
                            @foreach( $company->persons as $person )
                                @if( $person->id != $company->default_person)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $person->fullname }}</td>
                                        <td>{{ $person->email }}</td>
                                        <td>{{ $person->birthdate }}</td>
                                        <td>{{ $person->address['city'] }}</td>
                                        <td>{{ $person->address['region'] }}</td>
                                        <td>{{ $person->address['street'] }}</td>
                                        <td>{{ $person->address['home'] }}</td>
                                        <td><i class="fa fa-check-square fa-2x default_person"  data-id="{{ $person->id}}"></i></td>
                                    </tr>
                                    @php $i++ @endphp
                                @endif
                            @endforeach
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  
<script>
    $('.default_person').click(function(){
        var company_id = $('#name').data('id');
        var person_id = $(this).data('id');
        $.ajax({
            url: '{{ route("default_person") }}',
            method: 'POST',
            headers:{
                'X-CSRF-TOKEN':'{{ csrf_token()}}',
            },
            data:{
                company_id:company_id,
                person_id:person_id
            },
            success:function(data){
                location.reload();
            },
        });

    });
</script>




@endsection
           