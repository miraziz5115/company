@extends('layouts.site')

@section('content')

<div class="right_col" role="main">

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-12" style="">
        	<a href="{{ route('company.create')}}" class="btn btn-primary">Создать компании</a>	
        	<table class="table table-bordered">
        		<tr>
        			<th>№</th>
        			<th>Название компания</th>
                    <th>Контактное лицо по умолчанию</th>
                    <th>Адрес контактное лицо по умолчанию</th>
                    <th></th>
        		</tr>
        		@php $i = 1 @endphp
        		@foreach( $companies as $company)
        			<tr>
        				<td>{{ $i }}</td>
        				<td>{{ $company->name }}</td>
                        <td>{{ $company->defaultPerson['fullname'] }}</td>
                        <td>{{ $company->defaultPerson['address']['city'] }}, {{ $company->defaultPerson['address']['region']}},
                        {{ $company->defaultPerson['address']['street'] }},{{$company->defaultPerson['address']['home']}}</td>
                        <td><a href="{{ route('company.edit', $company->id)}}"><i class="fa fa-pencil"></i></a></td>
        			</tr>
        			@php $i++ @endphp
        		@endforeach
        		
        	</table>

		</div>

	</div>

</div>

@endsection

<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  


