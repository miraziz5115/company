@extends('layouts.site')

@section('content')

<div class="right_col" role="main">

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-4" style="">
        	<a href="{{ route('company.create')}}" class="btn btn-primary">Создать компании</a>	
        	<table class="table table-bordered">
        		<tr>
        			<th>№</th>
        			<th>Название компания</th>
        		</tr>
        		@php $i = 1 @endphp
        		@foreach( $companies as $company)
        			<tr>
        				<td>{{ $i }}</td>
        				<td>{{ $company->name }}</td>
        			</tr>
        			@php $i++ @endphp
        		@endforeach
        		
        	</table>

		</div>

	</div>

</div>

@endsection

<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  


