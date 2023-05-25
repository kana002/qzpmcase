@extends('layouts.master')

@section('content')

<div class="container-fluid">
	<div class="row">
		
		<div class="col-1">

			<form id="form1" action="{{route('like.store',['type'=>1])}}" method="post" name="form11">
				@csrf
				<input type="hidden" value="{{$user->id}}" name="user_id">
				<button type="submit" class="border-0 bg-transparent" name="form1" >
					<img src="{{asset('/images/1.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
        {{$ls}}
			</form>
			
      </div>

      <div class="col-1">
			<form id="form2" action="{{route('like.store', ['type'=>2])}}" method="post" name="form22">
				@csrf
				<input type="hidden" value="{{$user->id}}" name="user_id">
				<button type="submit" class="border-0  bg-transparent"  name="form2">
					<img src="{{asset('/images/2.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
        {{$sm}}
      </form>
      </div>
      
      <div class="col-1">
			<form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
				@csrf
        <input type="hidden" value="{{$user->id}}" name="user_id">
				<button type="submit" class="border-0 bg-transparent"  name="form3">
					<img src="{{asset('/images/3.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
        {{$ds}}
			</form>
		</div>
	</div>
</div>



<div class="mb-3">
	@foreach($commets as $comment )
		<label  class="form-label"><b>{{ mb_strtolower($user->name)}}</b></label><br>
		<label for="" class="form-label"><b>Комментарии</b></label>
		<div class="card">
			<div class="card-body">
			{{$comment->description}}
			</div>
		</div>
	@endforeach
</div>

<div class="mb-3" >
	<form action="{{ route('post.create')}}" method="post" name="form4" >
		@csrf
		<input type="hidden" value="{{$user->id}}" name="user_id">
		<label for="" class="form-label"><b>Оставить комментарий</b></label>
		<textarea class="form-control" id="description" rows="3" name="description"></textarea>
		<button type="submit" class="btn btn-primary" style="margin-left:60px"  name="form4">Отправить</button>
	</form>
</div>


@endsection