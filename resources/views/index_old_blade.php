@extends('layouts.master', ['index' => 'active bg-secondary rounded'])
@section('content')
<div style="padding-bottom: 150px">
	<div class="home_container">
		<div class="spacer"></div>
		<div class="home_text">
			@if(Config::get('app.locale') == 'kz')
				<h1>QAZAQSTAN<br>COUNTRY CASE</h1>
				<p>Зерттеудің негізгі мақсаты мемлекеттік басқару жүйесін трансформациялау қажеттілігін негіздеу және Қазақстанның мемлекеттік органдары басшылығы тарапынан іс-қимылдардың өзектілігі атмосферасын құру болып табылады.
				</p>
			@elseif (Config::get('app.locale') == 'ru')
				<h1>QAZAQSTAN<br>COUNTRY CASE</h1>
				<p>Ключевой целью исследования является обоснование необходимости трансформации системы государственного управления и создание атмосферы безотлагательности действий со стороны руководства государственных органов Казахстана.
				</p>
			@elseif (Config::get('app.locale') == 'en')
				<h1>QAZAQSTAN<br>COUNTRY CASE</h1>
				<p>The key objective of the case is to substantiate the need to transform the public administration system and create an atmosphere of urgency on the part of the leadership of the state bodies of Kazakhstan.
				</p>
			@endif
		</div>
		<div class="home_image">
    		@if(Config::get('app.locale') == 'ru')
				<img src="{{asset('/images/ru.jpg')}}">
			@elseif(Config::get('app.locale') == 'kz')
				<img src="{{asset('/images/kaz.jpg')}}">
			@elseif(Config::get('app.locale') == 'en')
				<img src="{{asset('/images/en.jpg')}}">
			@endif
		</div>
	</div>
	<div class="home2_container">
		<div class="toks-container">
			<div class="left_image">
				@if(Config::get('app.locale') == 'ru')
					<img src="{{asset('/images/ru.jpg')}}" class="anim_image">
				@elseif(Config::get('app.locale') == 'kz')
					<img src="{{asset('/images/kaz.jpg')}}" class="anim_image">
				@elseif(Config::get('app.locale') == 'en')
					<img src="{{asset('/images/en.jpg')}}" class="anim_image">
				@endif
			</div>
			<div class="right_text">
      			@if (Config::get('app.locale') == 'en')
					<p>The challenges and experiences of overcoming resistance described in the case, lessons learned, analysis of failures, practical recommendations are valuable not only for the Kazakh, but also for the international audience, government leaders, experts and practitioners in the field of change management and project management.
					<br> Disclosure of such information is rare when describing the experience of different countries, mostly the authors share their victories and successes.</p>
					<br>
				@elseif(Config::get('app.locale') == 'ru')
					<p>
					Описанные в кейсе вызовы и опыта преодоления сопротивления, извлеченные уроки, анализ ошибок, практические рекомендации представлять ценность не только для казахстанской, но и для международной аудитории, руководства правительств, экспертов и практиков в области управления изменениями и проектного менеджмента.
					<br>Раскрытие подобной информации является редкостью при описании опыта разных стран, в основном авторы делятся победами и успехами.</p>
					<br>
					<br>
				@elseif(Config::get('app.locale') == 'kz')
					<p>
					Кейсте сипатталған сын-тегеуріндер мен қарсылықты жеңу тәжірибесі, алынған сабақтар, қателерді талдау, практикалық ұсынымдар тек қазақстандық үшін ғана емес, сонымен қатар халықаралық аудитория, Үкімет басшылығы, өзгерістерді басқару және жобалық менеджмент саласындағы сарапшылар мен практиктер үшін құндылық ұсыну.
					<br> Мұндай ақпаратты ашу әр түрлі елдердің тәжірибесін сипаттауда сирек кездеседі, негізінен авторлар жеңістер мен жетістіктермен бөліседі.</p>
					<br>
				@endif
				@foreach($posts as $post)
					@foreach($post->title as $title)
						<p>
          				<a href="#{{$title->id}}">{!!$title->__('title')!!}</a></p>
					@endforeach
				@endforeach
			</div>
		</div>
		<div class="scrollable-area">
			<div class="text-container">
				@foreach($posts as $post)
					@foreach($post->title as  $title)
						<h2 id="{{$title->id}}">{!!$title->__('title')!!}</h2>
					@endforeach
					<p>{!!$post->__('description')!!}</p>
				@endforeach
			</div>
		</div>

		<div class="reactions_container">
			<div class="reactions_list">
				<!-- <form id="form1" action="{{route('like.store',['type'=>1])}}" method="post" name="form11">
					@csrf -->
					@foreach($user as $us)
						<input type="hidden" value="{{$us->id}}" name="user_id">
					@endforeach
					<div class="d-flex flex-row align-items-end">
						<button type="submit" class="border-0 bg-transparent" name="form1" id="like" onclick="myFunction()" >
							<img src="{{asset('/images/1.svg')}}" alt="" style="width:20px; height:20px;">
						</button>
						<span>{{$ls}}</span>
					</div>
				<!-- </form> -->
				<!-- <form id="form2" action="{{route('like.store', ['type'=>2])}}" method="post" name="form22">
					@csrf -->
					<input type="hidden" value="{{$us->id}}" name="user_id">
					<div class="d-flex flex-row align-items-end">
						<button type="submit" class="border-0  bg-transparent"  name="form2" onclick="myFunction()">
							<img src="{{asset('/images/2.svg')}}" alt="" style="width:20px; height:20px;">
						</button>
						<span>{{$sm}}</span>
					</div>
				<!-- </form> -->
				<!-- <form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
					@csrf -->
					<input type="hidden" value="{{$us->id}}" name="user_id">
					<div class="d-flex flex-row align-items-end">
						<button type="submit" class="border-0 bg-transparent"  name="form3" onclick="myFunction()">
							<img src="{{asset('/images/3.svg')}}" alt="" style="width:20px; height:20px;">
						</button>
						<span>{{$ds}}</span>
					</div>
				<!-- </form> -->
			<!-- <form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
				@csrf -->
				<input type="hidden" value="" name="user_id">
				<div class="d-flex flex-row align-items-end">
					<button type="button" class="border-0 bg-transparent"  name="form3" class="btn btn-info btn-sm'">
						<img src="{{asset('/images/5.svg')}}" alt="" style="width:20px; height:20px;">
					</button>
					<span>{{$vs}}</span>
				</div>


			<!-- </form> -->
			@auth
				<div class="col-1">
					<input type="hidden" value="" name="user_id">
					<a href="{{route('show.reviews')}}">
						<img src="{{asset('/images/4.svg')}}" alt="" style="width:20px; height:20px;">
					</a>
				</div>
			@endauth
			@guest
				<form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
					@csrf
					<input type="hidden" value="" name="user_id">
					<button type="button" class="border-0 bg-transparent"  onclick="myFunction()" name="form3" class="btn btn-info btn-sm'">
						<img src="{{asset('/images/4.svg')}}" alt="" style="width:20px; height:20px;">
					</button>
				</form>
			@endguest
			</div>
		</div>

		<div class="alert alert-danger" style="display: none;" id="alert">
			<strong>Пожалуйста,<a href="{{route('login')}}" class="alert-link"> авторизируйтесь</a> или <a href="{{route('register')}}" class="alert-link">  зарегистрируйтесь.</a>.</strong>
		</div>

	</div>
	<div class="about_visible py-5" id="about_visible">
		<div class="about_container" id="about_research">
			<div class="about_research_heading">
      @if ( Config::get('app.locale') == 'en')
      <h1>About Research</h1>

       @elseif ( Config::get('app.locale') == 'ru')
      <h1>Об исследовании</h1>

       @elseif ( Config::get('app.locale') == 'kz')
      <h1>Зерттеу туралы</h1>
       @endif
			</div>
			<div class="about_research_container">
				<div class="about_research_quote">

					<h1>I'm a paragraph. Click here to add your own text and edit me. Let your users get to know you.
					</h1>
					<p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<h2>Altair Akhmetov</h2>

				</div>
				<div class="about_research_photo">
					<img src="{{asset('/images/photo1681808595 (1).jpeg')}}">
				</div>
			</div>
			<div class="about_research_container">
				<div class="about_research_quote">
					<h1>I'm a paragraph. Click here to add your own text and edit me. Let your users get to know you.
					</h1>
					<p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<h2>Yerlan Abil</h2>
				</div>
				<div class="about_research_photo">
					<img src="{{asset('/images/Abil_Yerlan.png')}}">
				</div>
			</div>
			<div class="about_research_container">
				<div class="about_research_quote">
					<h1>I'm a paragraph. Click here to add your own text and edit me. Let your users get to know you.
					</h1>
					<p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<h2>Yerlan Abil</h2>
				</div>
				<div class="about_research_photo">
					<img src="{{asset('/images/4 (9).jpg')}}">
				</div>
			</div>
			<div class="about_research_container">
				<div class="about_research_quote">
					<p>Прочтение данного исследования вызывает чувства радости за значимые достижения Казахстана в области проектного менеджмента и тренд на непрерывное совершенствование.
						Это исследование является полезным руководством, для тех, кто планирует трансформацию системы управления государства или организации.
					</p>
					<p>Для удобства применения опыта, в исследовании описывается ситуация, предшествующая трансформации,
						описываются поставленные задачи по изменению ситуации, а также совершенные действия и полученные результаты.
						В дополнении к этому описываются ключевые вызовы, ошибки, извлеченные уроки, а также практические рекомендации по внедрению проектного менеджмента в систему государственного управления.
					</p>
					<p>Опыт Казахстана показал необходимость управления трансформацией как проектом или программой проектов, а также применения инструментов и методов Change Management для управляемого выхода из зоны комфорта и минимизации сопротивления изменениям.
					</p>
					<h2>Margulan Zhumagali</h2>
				</div>
				<div class="about_research_photo">
					<img src="{{asset('/images/photo1681808557(1).jpeg')}}">
				</div>
			</div>
		</div>
	</div>
	<div class="books_block_container" id="books">
		<div class="about_research_heading">
    @if ( Config::get('app.locale') == 'en')
    <h1>Books</h1>
     @elseif ( Config::get('app.locale') == 'ru')
    <h1>Книги</h1>
    @elseif ( Config::get('app.locale') == 'kz')
    <h1>Кітаптар</h1>
    @endif
		</div>
		<div class="bookshelf">
			<img src="{{asset('/images/kaz.jpg')}}">
			<img src="{{asset('/images/ru.jpg')}}">
			<img src="{{asset('/images/en.jpg')}}">
		</div>
		<a href="#" class="cart_btn">{{__('main.add_to_cart')}}</a>
	</div>

</div>

<script
src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
    <!-- <script src="../libs/ncalayer.js"></script> -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#like').click(function (e) {
            e.preventDefault();
           var user_id =  $("input[name='user_id']").val();
           //console.log(user_id)
         $.ajax({
            url: "{{route('like.store',['type'=>1])}}",
            type:'POST',
            data: {user_id:user_id},
            success: function(data) {
              // printMsg(data);




            }
            // getKeyInfoBack();
        });

        // $('#like').click(function (e) {
        //   e.preventDefault();
        //           $.ajax({
        //               url:"/home/get_likes/{id}",
        //               type:'GET',
        //               success: function(responce){
        //                 console.log(responce);
        //                   // $('#bottom').html(responce); //в этот див нужно вывести "новость"
        //               }
        //             });

           });
  </script>
@endsection
