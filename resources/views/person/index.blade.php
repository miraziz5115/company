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
                    <th>Компания</th>
                    <th colspan="2"></th>

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
                        <td>{{ $person->companyName['name'] }}</td>
                        <td><a href="{{ route('person.edit', $person->id) }}"><i class="fa fa-pencil"></i></a></td>
                        <td><i class="fa fa-trash red deletePerson" data-id="{{$person->id}}"></i></td>
        			</tr>
                    @php $i++ @endphp
        		@endforeach
        		
        	</table>

		</div>

	</div>

</div>

<script src="{{ asset('public/site/js/jquery-3.4.1.min.js')}}"></script>  
<script>
    $('.deletePerson').click(function(){
        deleteConfirm = confirm('Вы действительно хотите удалить');
        if(deleteConfirm){
            var person_id = $(this).data('id');
            $.ajax({
                url: "person/" + person_id,
                method: 'DELETE',
                dataType: "JSON",
                headers:{
                    'X-CSRF-TOKEN':'{{ csrf_token()}}',
                },
                data:{
                    person_id:person_id
                },
                success:function(data){
                    location.reload();
                },
            });
        }
        

    });
</script>
@endsection
