@extends('layouts.site')

@section('content')

<div class="right_col" role="main">
	<div class="col-md-6">
        <table class="table table-striped">
        	<tr>
        		<th></th>
        		<th></th>
        		<th></th>
        	</tr>
        	<tr>
        		<td>Компании</td>
        		<td>{{ App\Models\Company::all()->count() }}</td>
        	</tr>
        	<tr>
        		<td>Сотрудники компании</td>
        		<td>{{ App\Models\Person::all()->count() }}</td>
        	</tr>
        </table>
	</div>
</div>
@endsection
<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  


