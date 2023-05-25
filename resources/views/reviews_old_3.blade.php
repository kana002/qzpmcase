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

	<div class="row">
		<div class="py-5">
			<label for="" class="form-label"><b>Комментарии</b></label><br>
			@if($comments)
				@foreach($comments as $comment)
					@if($comment->answer_for_comment_id == 0)
						<div class="accordion py-3" id="accordionPanelsStayOpenExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="panelsStayOpen-heading{{$comment->id}}">
									<button
										class="accordion-button"
										type="button"
										data-bs-toggle="collapse"
										data-bs-target="#panelsStayOpen-collapse{{$comment->id}}"
										aria-expanded="true"
										aria-controls="panelsStayOpen-collapse{{$comment->id}}"
									>
										<div class="col">
											<div class="row">
												<p class="m-0 p-0">
													<strong>{{ $comment->user ? mb_strtolower($us->name) : 'автор'}}</strong>: {{$comment->description}}
												</p>
												@guest
													<a class="text-decoration-none btn btn-outline-warning" href="#{{$comment->id}}" onclick="myFunctionForAnswer('not_auth');">Ответить</a>
												@endguest
											</div>
											@auth
												<div class="row mt-2">
													<form action="{{ route('comment.create',['type'=>2])}}" method="post" name="form4">
														@csrf
														<a class="text-decoration-none btn btn-outline-info" href="#{{$comment->id}}">Ответить</a>
														<div class="card" hidden>
															<input type="hidden" value="{{$user_auth->id}}" name="user_id">
														</div>
														<div class="col mt-3" style="display: none;" id="answer_{{$comment->id}}">
															<label class="form-label m-0"><b>Мой ответ</b></label>
															<textarea
																class="form-control mt-3"
																rows="2"
																cols="55"
																name="answer_description"
															></textarea>
															<input type="hidden" value="{{$comment->id}}" name="comment_id">
															<button
																type="submit"
																class="btn text-danger btn-info btn-sm d-none"
															>Отправить</button>
														</div>
													</form>
												</div>
											@endauth
										</div>
									</button>
								</h2>
								<div
									id="panelsStayOpen-collapse{{$comment->id}}"
									class="accordion-collapse collapse show"
									aria-labelledby="panelsStayOpen-heading{{$comment->id}}"
								>
									@foreach($comments as $ans_for_comment)
										@if($ans_for_comment->answer_for_comment_id == $comment->id)
											<div class="accordion-body">
												<div class="col mt-3 ms-3">
													<p class="m-0">
														<strong>{{ $ans_for_comment->user ? mb_strtolower($ans_for_comment->user->name) : 'автор'}}</strong>:
															{{$ans_for_comment->description}}
													</p>
													@guest
														<a class="text-decoration-none btn btn-outline-danger"
														href="#subanswer_{{$ans_for_comment->id}}"
														onclick="myFunctionForSubanswer('not_auth')">Ответить</a>
													@endguest
													@auth
														<div class="col ms-1 mt-2">
															<form action="{{ route('comment.create',['type'=>2])}}" method="post" name="form4">
																@csrf
																<a class="text-decoration-none btn btn-outline-success"
																	href="#subanswer_{{$ans_for_comment->id}}"
																	onclick="myFunctionForSubanswer(subanswer_{{$ans_for_comment->id}});">Ответить</a>
																<div class="card" hidden>
																	<input type="hidden" value="{{$user_auth->id}}" name="user_id">
																</div>
																<div class="col mt-3" style="display: none;" id="subanswer_{{$ans_for_comment->id}}">
																	<label class="form-label m-0"><b>Мой ответ</b></label>
																	<textarea
																		class="form-control mt-2"
																		rows="2"
																		cols="55"
																		name="answer_description"
																	></textarea>
																	<input type="hidden" value="{{$ans_for_comment->id}}" name="subcomment_id">
																	<button
																		type="submit"
																		class="btn btn-primary my-3"
																	>Отправить</button>
																</div>
															</form>
														</div>
													@endauth
												</div>
											</div>
										@endif
									@endforeach
								</div>
							</div>
						</div>
					@endif
				@endforeach
			@endif
		</div>
	</div>
	<div class="container py-5">
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
		else el.style.display = "block";
	}
	function myFunctionForSubanswer(el)
	{
		if(el == 'not_auth') window.location = '/login'
		else el.style.display = "block";
	}
</script>
@endsection