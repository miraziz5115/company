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
                    <th colspan="2"></th>
        		</tr>
        		@php $i = 1 @endphp
        		@foreach( $companies as $company)
        			<tr>
        				<td>{{ $i }}</td>
        				<td>{{ $company->name }}</td>
                        <td>@if($company->defaultPerson)
                                {{ $company->defaultPerson['fullname'] }}
                            @else
                                Нет данных
                            @endif
                        </td>
                        <td>@if($company->defaultPerson)
                                {{ $company->defaultPerson['address']['city'] }}, 
                                {{ $company->defaultPerson['address']['region']}},
                                {{ $company->defaultPerson['address']['street']}},
                                {{$company->defaultPerson['address']['home']}}
                            @else
                                Нет данных
                            @endif
                        </td>
                        <td><a href="{{ route('company.edit', $company->id)}}"><i class="fa fa-pencil"></i></a></td>
                        <td><i class="fa fa-trash red deleteCompany" data-id="{{$company->id}}"></i></td>
        			</tr>
        			@php $i++ @endphp
        		@endforeach
        	</table>
		</div>
	</div>
</div>
<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  
<script>
    $('.deleteCompany').click(function(){
        deleteConfirm = confirm('Вы действительно хотите удалить');
        if(deleteConfirm){
            var company_id = $(this).data('id');
            $.ajax({
                url: "company/" + company_id,
                method: 'DELETE',
                headers:{
                    'X-CSRF-TOKEN':'{{ csrf_token()}}',
                },
                data:{
                    company_id:company_id
                },
                success:function(data){
                    location.reload();
                },
            });
        }
    });
</script>
@endsection


