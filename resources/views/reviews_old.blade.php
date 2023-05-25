@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row">
		<p class="text-center text-uppercase fw-bold">Пост</p>
	</div>
	<div class="row">
		<div class="col-1">
			<form id="form1" action="{{route('like.store',['type'=>1])}}" method="post" name="form11">
				@csrf
				@foreach($user as $us)
				<input type="hidden" value="{{$us->id}}" name="user_id">
				@endforeach
				<button type="submit" class="border-0 bg-transparent" name="form1" >
					<img src="{{asset('/images/1.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
        		{{$ls}}
			</form>
		</div>

		<div class="col-1">
			<form id="form2" action="{{route('like.store', ['type'=>2])}}" method="post" name="form22">
				@csrf
				<input type="hidden" value="{{$us->id}}" name="user_id">
				<button type="submit" class="border-0  bg-transparent"  name="form2">
					<img src="{{asset('/images/2.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
				{{$sm}}
			</form>
		</div>

		<div class="col-1">
			<form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
				@csrf
				<input type="hidden" value="{{$us->id}}" name="user_id">
				<button type="submit" class="border-0 bg-transparent"  name="form3">
					<img src="{{asset('/images/3.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
				{{$ds}}
			</form>
		</div>

		@guest
		<div class="col-1">
			<form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
				@csrf
        		<input type="hidden" value="" name="user_id">
				<button type="button" class="border-0 bg-transparent"  onclick="myFunction()" name="form3" class="btn btn-info btn-sm'">
					<img src="{{asset('/images/4.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
			</form>
		</div>
		@endguest

		<div class="col-1">
			<form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
				@csrf
				<input type="hidden" value="" name="user_id">
				<button type="button" class="border-0 bg-transparent"  onclick="myFunction()" name="form3" class="btn btn-info btn-sm'">
					<img src="{{asset('/images/5.svg')}}" alt="" style="width:20px; height:20px;">
				</button>
				{{$vs}}
			</form>
		</div>
	</div>
	<!-- alert -->
	<div class="alert alert-danger" style="display: none;" id="alert">
		Пожалуйста, <a href="{{route('login')}}" class="alert-link"> авторизируйтесь</a> или <a href="{{route('register')}}" class="alert-link">  зарегистрируйтесь.</a>.
	</div>
	<!-- alert -->
	<div class="py-5">
		<label for="" class="form-label"><b>Комментарии</b></label><br>
		@foreach($comments as $comment)
			<div class="accordion" id="accordionPanelsStayOpenExample">
				<div class="accordion-item">
					<h2 class="accordion-header" id="panelsStayOpen-headingOne">
					<button
						class="accordion-button"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#panelsStayOpen-collapseOne"
						aria-expanded="true"
						aria-controls="panelsStayOpen-collapseOne"
					>
						<strong>{{ $comment->user ? mb_strtolower($us->name) : 'автор'}}</strong>
						<div>
							{{$comment->description}}
						</div>
						<a class="text-decoration-none" href="#{{$comment->id}}" onclick="myFunctionForAnswer('not_auth');">Ответить</a>
						@auth
							<div class="col ms-1 mt-2">
								<form action="{{ route('comment.create',['type'=>2])}}" method="post" name="form4">
									@csrf
									<a class="text-decoration-none" href="#{{$comment->id}}">Ответить</a>
									<div class="card" hidden>
										<input type="hidden" value="{{$user_auth->id}}" name="user_id">
									</div>
									<textarea
										class="form-control mt-3"
										style="display:none;"
										id="{{$comment->id}}"
										rows="2"
										cols="55"
										name="answer_description"
									></textarea>
									<input type="hidden" value="{{$comment->id}}" name="comment_id">
									<button
										type="submit"
										class="border-0 bg-transparent"
										id="push"
										class="btn btn-info btn-sm'"
										style="display:none"
									>Отправить</button>
								</form>
							</div>
						@endauth
					</button>
					</h2>
					<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
						<div class="accordion-body">
							@foreach($comment->answer_comment as $ans_description)
								<div class="col mt-3 ms-3">
									<label class="form-label m-0"><b>{{ $ans_description->user ? mb_strtolower($ans_description->user->name) : 'автор'}}</b></label>
									<div class="">
										{{$ans_description->description}}
									</div>

									<a class="text-decoration-none" href="#subanswer_{{$ans_description->id}}" onclick="myFunctionForSubanswer('not_auth')">Ответить</a>
									@auth
										<div class="col ms-1 mt-2">
											<form action="{{ route('comment.create',['type'=>2])}}" method="post" name="form4">
												@csrf
												<a class="text-decoration-none" href="#subanswer_{{$ans_description->id}}" onclick="myFunctionForSubanswer(subanswer_{{$ans_description->id}});">Ответить</a>
												<div class="card" hidden>
													<input type="hidden" value="{{$user_auth->id}}" name="user_id">
												</div>
												<div class="col mt-3" style="display: none;" id="subanswer_{{$ans_description->id}}">
													<label class="form-label m-0"><b>Мой ответ</b></label>
													<textarea
														class="form-control mt-2"
														rows="2"
														cols="55"
														name="answer_description"
													></textarea>
													<input type="hidden" value="{{$comment->id}}" name="comment_id">
													<button
														type="submit"
														class="btn btn-primary my-3"
													>Отправить</button>
												</div>
											</form>
										</div>
									@endauth
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		@endforeach

		{{--@foreach($comments as $comment)
		<div class="my-3 p-3 rounded border">
			<label class="form-label"><b>{{ $comment->user ? mb_strtolower($us->name) : 'автор'}}</b></label>
			{{--@foreach($user as $us)
				@if($comment->user_id == $us->id)
					<label class="form-label"><b>{{ mb_strtolower($us->name)}}</b></label>
				@endif
			@endforeach--}}

			<div class="">
				{{$comment->description}}
			</div>

			<a class="text-decoration-none" href="#{{$comment->id}}" onclick="myFunctionForAnswer('not_auth');">Ответить</a>
			@auth
				<div class="col ms-1 mt-2">
					<form action="{{ route('comment.create',['type'=>2])}}" method="post" name="form4">
						@csrf
						<a class="text-decoration-none" href="#{{$comment->id}}">Ответить</a>
						<div class="card" hidden>
							<input type="hidden" value="{{$user_auth->id}}" name="user_id">
						</div>
						<textarea
							class="form-control mt-3"
							style="display:none;"
							id="{{$comment->id}}"
							rows="2"
							cols="55"
							name="answer_description"
						></textarea>
						<input type="hidden" value="{{$comment->id}}" name="comment_id">
						<button
							type="submit"
							class="border-0 bg-transparent"
							id="push"
							class="btn btn-info btn-sm'"
							style="display:none"
						>Отправить</button>
					</form>
				</div>
			@endauth

			@foreach($comment->answer_comment as $ans_description)
				<div class="col mt-3 ms-3">
					<label class="form-label m-0"><b>{{ $ans_description->user ? mb_strtolower($ans_description->user->name) : 'автор'}}</b></label>
					<div class="">
						{{$ans_description->description}}
					</div>

					<a class="text-decoration-none" href="#subanswer_{{$ans_description->id}}" onclick="myFunctionForSubanswer('not_auth')">Ответить</a>
					@auth
						<div class="col ms-1 mt-2">
							<form action="{{ route('comment.create',['type'=>2])}}" method="post" name="form4">
								@csrf
								<a class="text-decoration-none" href="#subanswer_{{$ans_description->id}}" onclick="myFunctionForSubanswer(subanswer_{{$ans_description->id}});">Ответить</a>
								<div class="card" hidden>
									<input type="hidden" value="{{$user_auth->id}}" name="user_id">
								</div>
								<div class="col mt-3" style="display: none;" id="subanswer_{{$ans_description->id}}">
									<label class="form-label m-0"><b>Мой ответ</b></label>
									<textarea
										class="form-control mt-2"
										rows="2"
										cols="55"
										name="answer_description"
									></textarea>
									<input type="hidden" value="{{$comment->id}}" name="comment_id">
									<button
										type="submit"
										class="btn btn-primary my-3"
									>Отправить</button>
								</div>
							</form>
						</div>
					@endauth
				</div>
			@endforeach
		</div>
		@endforeach--}}
	</div>
	@auth
		<div class="mb-3" >
			<form action="{{ route('comment.create', ['type'=>1])}}" method="post" name="form4">
				@csrf
				<input type="hidden" value="{{$user_auth->id}}" name="user_id">
				<label for="" class="form-label"><b>Оставить комментарий</b></label>
				<textarea class="form-control" id="description" rows="3" name="description"></textarea>
				<button type="submit" class="btn btn-primary mt-3" style=""  name="form4">Отправить</button>
			</form>
		</div>
	@endauth
</div>
@endsection

@section('scripts')
<script>
	function myFunction() {
		document.getElementById("alert").style.display = "block";
	}
	function myFunctionForAnswer(el)
	{
		if(el == 'not_auth') window.location = '/login'
		else
		{
			document.getElementById("{{$comment->id}}").style.display = "block";
			document.getElementById("push").style.display = "block";
		}
	}
	function myFunctionForSubanswer(el)
	{
		if(el == 'not_auth') window.location = '/login'
		else el.style.display = "block";
	}
</script>
@endsection