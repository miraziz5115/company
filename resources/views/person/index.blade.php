@extends('layouts.site')

@section('content')

<div class="right_col" role="main">

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-12" style="">
        	<a href="{{ route('person.create')}}" class="btn btn-primary">Добавить персонал</a>	
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
                    <th></th>
        		</tr>
        		@php $i = 1 @endphp
        		@foreach( $persons as $person )
        			<tr>
        				<td>{{ $i }}</td>
        				<td>{{ $person->fullname }}</td>
                        <td>{{ $person->email }}</td>
                        <td>{{ $person->birthdate }}</td>
                        <td>{{ $person->address['city'] }}</td>
                        <td>{{ $person->address['region'] }}</td>
                        <td>{{ $person->address['street'] }}</td>
                        <td>{{ $person->address['home'] }}</td>
                        <td><a href="{{ route('person.edit', $person->id) }}"><i class="fa fa-pencil"></i></a></td>
        			</tr>
                    @php $i++ @endphp
        		@endforeach
        		
        	</table>

		</div>

	</div>

</div>

@endsection