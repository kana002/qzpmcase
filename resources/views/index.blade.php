@extends('layouts.master', ['index' => 'active bg-secondary rounded'])
@section('content')

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
      @else
        <h1>QAZAQSTAN<br>COUNTRY CASE</h1>
				<p>Ключевой целью исследования является обоснование необходимости трансформации системы государственного управления и создание атмосферы безотлагательности действий со стороны руководства государственных органов Казахстана.
				</p>
			@endif
		</div>
		<div class="home_image">
    @if(Config::get('app.locale') == 'kz')
				<img src="{{asset('/images/kaz.jpg')}}">
    		@elseif(Config::get('app.locale') == 'ru')
				<img src="{{asset('/images/ru.jpg')}}">
			@elseif(Config::get('app.locale') == 'en')
				<img src="{{asset('/images/en.jpg')}}">
        @else
        <img src="{{asset('/images/ru.jpg')}}">
			@endif
		</div>
	</div>
	<div class="home2_container">

		<div class="toks-container">
			<div class="left_image">
				@if(Config::get('app.locale') == 'kz')
        <img src="{{asset('/images/kaz.jpg')}}" class="anim_image">
				@elseif(Config::get('app.locale') == 'ru')
        <img src="{{asset('/images/ru.jpg')}}" class="anim_image">
				@elseif(Config::get('app.locale') == 'en')
					<img src="{{asset('/images/en.jpg')}}" class="anim_image">
          @else
          <img src="{{asset('/images/ru.jpg')}}" class="anim_image">
				@endif
			</div>
			<div class="right_text">
        @if(Config::get('app.locale') == 'kz')
					<p>
					Кейсте сипатталған сын-тегеуріндер мен қарсылықты жеңу тәжірибесі, алынған сабақтар, қателерді талдау, практикалық ұсынымдар тек қазақстандық үшін ғана емес, сонымен қатар халықаралық аудитория, Үкімет басшылығы, өзгерістерді басқару және жобалық менеджмент саласындағы сарапшылар мен практиктер үшін құндылық ұсыну.
					<br> Мұндай ақпаратты ашу әр түрлі елдердің тәжірибесін сипаттауда сирек кездеседі, негізінен авторлар жеңістер мен жетістіктермен бөліседі.</p>
					<br>
          @elseif(Config::get('app.locale') == 'ru')
					<p>
					Описанные в кейсе вызовы и опыта преодоления сопротивления, извлеченные уроки, анализ ошибок, практические рекомендации представлять ценность не только для казахстанской, но и для международной аудитории, руководства правительств, экспертов и практиков в области управления изменениями и проектного менеджмента.
					<br>Раскрытие подобной информации является редкостью при описании опыта разных стран, в основном авторы делятся победами и успехами.</p>
					<br>
					@elseif (Config::get('app.locale') == 'en')
					<p>The challenges and experiences of overcoming resistance described in the case, lessons learned, analysis of failures, practical recommendations are valuable not only for the Kazakh, but also for the international audience, government leaders, experts and practitioners in the field of change management and project management.
					<br> Disclosure of such information is rare when describing the experience of different countries, mostly the authors share their victories and successes.</p>
					<br>
          @else
          <p>
					Описанные в кейсе вызовы и опыта преодоления сопротивления, извлеченные уроки, анализ ошибок, практические рекомендации представлять ценность не только для казахстанской, но и для международной аудитории, руководства правительств, экспертов и практиков в области управления изменениями и проектного менеджмента.
					<br>Раскрытие подобной информации является редкостью при описании опыта разных стран, в основном авторы делятся победами и успехами.</p>
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
			<div class="text-container" >

				@foreach($posts as $post)
					@foreach($post->title as  $title)
						<h2 id="{{$title->id}}">{!!$title->__('title')!!}</h2>
					@endforeach

					<p>{!!$post->__('description')!!}</p>

				@endforeach

			</div>
		</div>
    <div class="reactions_container mt-3">
			<div class="reactions_list">

				<div class="d-flex flex-row align-items-end">
        @guest
					<button type="submit" class="border-0 bg-transparent" name="form1" id="like" onclick="myFunction()" >
						<img src="{{asset('/images/1.svg')}}" alt="" style="width: 35px; height:35px;">
					</button>
          @endguest
					
            @auth
        <form id="form1" action="{{route('like.store',['type'=>1])}}" method="post" name="form11">
				@csrf
				@foreach($user as $us)
				<input type="hidden" value="{{$us->id}}" name="user_id">
				@endforeach
				<button type="submit" class="border-0 bg-transparent" name="form1" >
					<img src="{{asset('/images/1.svg')}}" alt="" style="width: 35px; height:35px;">
				</button>
      
			</form>
      @endauth
      <span>{{$ls}}</span>
      </div>

				<div class="d-flex flex-row align-items-end">
        @guest
					<button type="submit" class="border-0  bg-transparent"  name="form2" onclick="myFunction()">
						<img src="{{asset('/images/2.svg')}}" alt="" style="width:35px; height:35px;">
					</button>
          @endguest
          @auth
          <form id="form2" action="{{route('like.store', ['type'=>2])}}" method="post" name="form22">
				@csrf
				<input type="hidden" value="{{$us->id}}" name="user_id">
				<button type="submit" class="border-0  bg-transparent"  name="form2">
					<img src="{{asset('/images/2.svg')}}" alt="" style="width:35px; height:35px;">
				</button>
					</form>
          @endauth
					<span>{{$sm}}</span>
				</div>

				<div class="d-flex flex-row align-items-end">
        @guest
					<button type="submit" class="border-0 bg-transparent"  name="form3" onclick="myFunction()">
						<img src="{{asset('/images/3.svg')}}" alt="" style="width:35px; height:35px;">
					</button>
          @endguest

          @auth
          <form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
				@csrf
				<input type="hidden" value="{{$us->id}}" name="user_id">
				<button type="submit" class="border-0 bg-transparent"  name="form3">
					<img src="{{asset('/images/3.svg')}}" alt="" style="width:35px; height:35px;">
				</button>
				
			</form>
      @endauth
					<span>{{$ds}}</span>
				</div>

				<div class="d-flex flex-row align-items-end">
					<button type="button" class="border-0 bg-transparent"  name="form3" class="btn btn-info btn-sm'">
						<img src="{{asset('/images/5.svg')}}" alt="" style="width:35px; height:35px;">
					</button>
					<span>{{$vs}}</span>
				</div>

				@auth
					<div class="col-1">

						<a href="{{route('show.reviews')}}">
							<img src="{{asset('/images/4.svg')}}" alt="" style="width:35px; height:35px;">
						</a>
					</div>
				@endauth
				@guest
					<form id="form3" action="{{route('like.store',['type'=>3])}}" method="post" name="form33">
						@csrf
						<button type="button" class="border-0 bg-transparent"  onclick="myFunction()" name="form3" class="btn btn-info btn-sm'">
							<img src="{{asset('/images/4.svg')}}" alt="" style="width:35px; height:35px;">
						</button>
					</form>
				@endguest


        </div>
			</div>
		</div>


		<div class="alert alert-danger" style="display: none; text-align: center; margin-top: 20px;" id="alert">
			<strong>Пожалуйста,<a href="{{route('login')}}" class="alert-link"> авторизируйтесь</a> или <a href="{{route('register')}}" class="alert-link">  зарегистрируйтесь.</a>.</strong>
        </div>
    </div>


    <div class="about_visible py-5" id="about_visible">
      <div class="about_container" id="about_research">
        <div class="about_research_heading">
         @if ( Config::get('app.locale') == 'kz')
            <h1>Зерттеу туралы</h1>
            @elseif ( Config::get('app.locale') == 'ru')
            <h1>Об исследовании</h1>
           @elseif ( Config::get('app.locale') == 'en')
            <h1>About Research</h1>
            @else
            <h1>Об исследовании</h1>

          @endif
        </div>
        <div class="about_research_container">
          <div class="about_research_quote">
          @if ( Config::get('app.locale') == 'kz')
            <h1>Бұл жобалық менеджментті мемлекеттік басқаруға енгізудегі қазақстандық тәжірибенің ашық, сыни әрі тәжірибеге бағдарланған сипаттамасы. </h1>
            <p>Материал қателіктерді анықтаумен, сабақ алумен және практиктерге арналған ұсыныстармен құнды. </p>
            <p>Шетелдік аудитория үшін қазақстандық тәжірибе екі есе құнды болуы мүмкін, өйткені ол «сәтсіздіктерге» кезігуге жол бермейді және жобалық менеджментті сәтті енгізуге ықпал етеді. 
Авторлар азаматтардың әл-ауқатын жақсартуды басты мақсат тұтады. Жобалық менеджмент - түпкі мақсат емес, бұл нақты өзгерістердің қажетті механизмі.</p>
            <p>Кейс жобалар мен бағдарламалардың мемлекетаралық портфелін сәтті басқара алатын жобалық менеджмент саласындағы халықаралық құзыреттер орталығын құруға жетелейді.</p>
              <h2>Әлтайыр Ахметов</h2>
              @elseif ( Config::get('app.locale') == 'ru')
            <h1>Это откровенное, самокритичное и практико-ориентированное описание казахстанского опыта внедрения проектного менеджмента в государственное управление.
            </h1>
            <p>Ценность материала в определении ошибок, извлечении уроков и рекомендациях для практиков. 
            </p>
            <p>Для иностранной аудитории казахстанский опыт может быть вдвойне ценным поскольку, не позволит допустить «провалов» и поспособствуют успешному внедрению проектного менеджмента.
            </p>
            <p>Авторами движет служение ценности улучшения благосостояния граждан. Проектный менеджмент - не самоцель, но необходимый механизм реальных изменений.
Кейс инициирует создание международного центра компетенций в области проектного менеджмента, который мог бы успешно управлять межгосударственным портфелем проектов и программ.
              </p>
              <h2>Альтаир Ахметов</h2>
              @elseif ( Config::get('app.locale') == 'en')
            <h1>This is an open, self-critical, and practice-oriented description of Kazakhstan's experience in implementing project management in public administration.
            </h1>
            <p>The value of this material lies in identifying mistakes, extracting lessons, and providing recommendations for practitioners. For foreign audiences, Kazakhstan's experience can be doubly valuable as it can prevent "failures" and contribute to the successful implementation of project management.
            The authors are driven by the desire to improve the well-being of citizens, and project management is not an end in itself, but a necessary mechanism for real change.  
          </p>
            <p>The case study initiates the creation of an international center of competence in project management, which could successfully manage an intergovernmental portfolio of projects and programs.</p>
            <h2>Altair Akhmetov</h2>
            @else
            <h1>Это откровенное, самокритичное и практико-ориентированное описание казахстанского опыта внедрения проектного менеджмента в государственное управление.
            </h1>
            <p>Ценность материала в определении ошибок, извлечении уроков и рекомендациях для практиков. 
            </p>
            <p>Для иностранной аудитории казахстанский опыт может быть вдвойне ценным поскольку, не позволит допустить «провалов» и поспособствуют успешному внедрению проектного менеджмента.
            </p>
            <p>Авторами движет служение ценности улучшения благосостояния граждан. Проектный менеджмент - не самоцель, но необходимый механизм реальных изменений.
Кейс инициирует создание международного центра компетенций в области проектного менеджмента, который мог бы успешно управлять межгосударственным портфелем проектов и программ.
              </p>
              <h2>Альтаир Ахметов</h2>
            @endif
          </div>
          <div class="about_research_photo">
            <img src="{{asset('/images/photo1681808595 (1).jpeg')}}">
          </div>
        </div>
        <div class="about_research_container">
          <div class="about_research_quote">
            @if ( Config::get('app.locale') == 'kz')
            <h1>Жобалық менеджмент ұйымға ресурстарды ұтымды пайдаланумен қатар мәлімделген мерзімде қажетті нәтижелерге қол жеткізуді қамтамасыз етуге мүмкіндік береді. 
            </h1>
            <p>Алға қойылған міндеттерге қол жеткізу үшін дербес жауапкершілікті арттыру, басқару шешімдерін қабылдаудың негізділігі, сондай-ақ жобаны іске асырудың барлық кезеңдерінде қатаң бақылау жүргізу сыбайлас жемқорлық тәуекелдерін азайтуға, билік пен халық арасында тиімді коммуникацияны қамтамасыз етуге мүмкіндік береді.
            </p>
            <p>Тәуелсіздіктің алғашқы жылдарында жобалық менеджментті енгізу бойынша жасалған әрекеттер ашықтықты, белсенді қатысу мен есеп беруді талап еткен жаңашылдыққа ішінара қарсылық болғандықтан айтулы күйінде қалды. Мемлекеттік қызметшілерді оқытуға деген жүйелі тәсіл мен кәсіби сертификаттау бұл жағдайды өзгертуге мүмкіндік берді. 
            </p>
            <p>Жобалық менеджментті мемлекеттік басқаруға енгізу бойынша қазақстандық тәжірибе кәсіби аудиторияға да, өзге оқырмандарға да пайдалы болады.
              </p>
            <h2>Ерлан Әбіл</h2>
            @elseif ( Config::get('app.locale') == 'ru')
            <h1>Проектный менеджмент позволяет организации обеспечить достижение искомых результатов в заявленные сроки наряду с рациональным использованием ресурсов. 
            </h1>
            <p>Повышение персональной ответственности за достижение поставленных задач, обоснованность принятия управленческих решений, а также жесткий контроль на всех стадиях реализации проекта позволяет снизить коррупционные риски, обеспечить эффективную коммуникацию между властью и населением.
            </p>
            <p>Попытки внедрения проектного менеджмента в первые годы независимости остались на уровне инициативы отчасти из-за сопротивления нововведению, которое провозглашало транспарентность, вовлеченность и подотчетность. Системный подход к обучению и профессиональная сертификация государственных служащих позволили переломить ситуацию.
            </p>
            <p>Казахстанский опыт внедрения проектного менеджмента в государственное управление будет полезен как профессиональной аудитории, так и широкому кругу читателей.</p>
            <h2>Ерлан Әбіл</h2>
            @elseif ( Config::get('app.locale') == 'en')
            <h1>Project management enables an organization to achieve desired results within a set timeframe while using resources efficiently.</h1>
            <p> Increasing personal responsibility for achieving the set goals, the validity of managerial decisions, strict control at all stages of project implementation can reduce corruption risks and ensure effective communication between authorities and the public.</p>
            <p>Efforts to introduce project management in the early years of independence remained at the level of the initiative partly because of the resistance to innovations that proclaimed transparency, inclusiveness and accountability. A systematic approach to training and professional certification of civil servants made it possible to turn the tide.</p>
            <p>Kazakhstan's experience in implementing project management in public administration will be useful to a professional audience and a wide range of readers.</p>
            <h2>Yerlan Abil</h2>
            @else
            <h1>Проектный менеджмент позволяет организации обеспечить достижение искомых результатов в заявленные сроки наряду с рациональным использованием ресурсов. 
            </h1>
            <p>Повышение персональной ответственности за достижение поставленных задач, обоснованность принятия управленческих решений, а также жесткий контроль на всех стадиях реализации проекта позволяет снизить коррупционные риски, обеспечить эффективную коммуникацию между властью и населением.
            </p>
            <p>Попытки внедрения проектного менеджмента в первые годы независимости остались на уровне инициативы отчасти из-за сопротивления нововведению, которое провозглашало транспарентность, вовлеченность и подотчетность. Системный подход к обучению и профессиональная сертификация государственных служащих позволили переломить ситуацию.
            </p>
            <p>Казахстанский опыт внедрения проектного менеджмента в государственное управление будет полезен как профессиональной аудитории, так и широкому кругу читателей.</p>
            <h2>Ерлан Әбіл</h2>
            @endif

          </div>
          <div class="about_research_photo">
            <img src="{{asset('/images/Abil_Yerlan.png')}}">
          </div>
        </div>
        <div class="about_research_container">
          <div class="about_research_quote">
          @if ( Config::get('app.locale') == 'kz')
            <h1>Астана Мемлекеттік қызмет хабына және бүкіл командаға осы зерттеу жобасының өткізілгені үшін алғыс айтамын!
            </h1>
            <p>Бұл зерттеу кез келген елдің мемлекеттік басқару жүйесіне жобалық менеджментті енгізу саласындағы жаңа ауқымды зерттеу жобаларының катализаторы бола алады.
            </p>
            <p>Бұл сайт жобалық басқаруды дамыту және енгізу үшін тәжірибе, идеялар, бастамалар алмасудың интерактивті алаңы болып табылады. Авторлар жобалық қоғамдастықпен бірлесіп, жаңа ғылыми жобаларға дайын. Қателіктерден аулақ болу және ұйымыңызға, салаңызға, аймағыңызға немесе еліңізге жобалық тәсілді сәтті енгізу үшін біз тәжірибелермен, материалдармен бөлісуге, семинарлар мен тренингтер өткізуге қуаныштымыз.
            </p>
            <p>Материал үкімет қызметкерлері мен түрлі елдердің сарапшылары біздің зерттеуімізді әрқашан қолында ұстайтындай және Қазақстан алған сабақтарды есепке алатындай етіп баяндалған.</p>
            <h2>Евниев Арман </h2>
           @elseif ( Config::get('app.locale') == 'ru')
           <h1>Благодарен Астанинскому хабу госслужбы и всей команде за то, что этот исследовательский проект состоялся!
            </h1>
            <p>Данное исследование может стать катализатором новых масштабных исследовательских проектов в области внедрения проектного менеджмента в систему госуправления любой страны.
            </p>
            <p>Настоящий сайт является интерактивной площадкой обмена опытом, идеями, инициативами для развития и внедрения проектного управления. Авторы совместно с проектным сообществом готовы к новым исследовательским проектам. Мы будем рады делиться опытом, материалами, проводить семинары и тренинги, чтобы Вы избежали ошибок и успешно внедрили проектный подход в своей организации, отрасли, регионе или стране.
            </p>
            <p>Материал изложен так, чтобы сотрудники правительств и эксперты различных стран всегда имели под рукой наше исследование и могли учесть уроки, извлеченные Казахстаном.</p>
            <h2>Евниев Арман </h2>
            @elseif ( Config::get('app.locale') == 'en')
            <h1>Thankful to Astana Civil Service Hub and the whole team for making this research project happen!
            </h1>
            <p>This study can become a catalyst for new large-scale research projects in the field of implementing project management into the government system of any country.
            </p>
            <p>This website is an interactive platform for exchanging experiences, ideas, and initiatives for the development and implementation of project management. The authors, together with the project community, are ready for new research projects. We will be happy to share our experience, materials, conduct seminars and trainings to help you avoid mistakes and successfully implement a project approach in your organization, industry, region or country.
            </p>
            <p>The material is presented in a way that government employees and experts from different countries always have our research at hand and can take into account the lessons learned by Kazakhstan.</p>
            <h2>Евниев Арман </h2>
            @else
            <h1>Благодарен Астанинскому хабу госслужбы и всей команде за то, что этот исследовательский проект состоялся!
            </h1>
            <p>Данное исследование может стать катализатором новых масштабных исследовательских проектов в области внедрения проектного менеджмента в систему госуправления любой страны.
            </p>
            <p>Настоящий сайт является интерактивной площадкой обмена опытом, идеями, инициативами для развития и внедрения проектного управления. Авторы совместно с проектным сообществом готовы к новым исследовательским проектам. Мы будем рады делиться опытом, материалами, проводить семинары и тренинги, чтобы Вы избежали ошибок и успешно внедрили проектный подход в своей организации, отрасли, регионе или стране.
            </p>
            <p>Материал изложен так, чтобы сотрудники правительств и эксперты различных стран всегда имели под рукой наше исследование и могли учесть уроки, извлеченные Казахстаном.</p>
            <h2>Евниев Арман </h2>
            @endif
          </div>
          <div class="about_research_photo">
            <img src="{{asset('/images/4 (9).jpg')}}">
          </div>
        </div>
        <div class="about_research_container">
          <div class="about_research_quote">
            @if ( Config::get('app.locale') == 'kz')
            <h1>Бұл зерттеуді оқи отырып, Қазақстандағы жобалық менеджмент саласындағы елеулі жетістіктер мен үздіксіз жетілдіруге деген тренд үшін қуанасың.</h1>
            <p>Зерттеу мемлекеттің немесе ұйымның басқару жүйесін өзгертуді жоспарлайтындар үшін пайдалы нұсқаулық болып табылады. Тәжірибені іс жүзінде қолдануға ыңғайлы болу үшін зерттеуде трансформацияға дейінгі жағдай сипатталған. Сонымен қатар жағдайды өзгерту бойынша қойылған міндеттер, жасалған іс-әрекеттер мен нәтижелер баяндалған. Бұған қоса, негізгі сын-қатерлер, қателер, одан алатын сабақтар, сондай-ақ мемлекеттік басқару жүйесіне жобалық менеджментті енгізуге қатысты практикалық ұсынымдар берілген. </p>
            <p>Қазақстанның тәжірибесі трансформацияны жоба немесе жобалар бағдарламасы ретінде басқару қажеттігін, сондай-ақ жайлылық аймағынан шығу және өзгерістерге қарсылықты азайту үшін Change Management құралдары мен әдістерін қолдану керектігін көрсетіп отыр.
              </p>
              <h2>Марғұлан Жұмағали</h2>
              @elseif ( Config::get('app.locale') == 'ru')
            <p>Прочтение данного исследования вызывает чувства радости за значимые достижения Казахстана в области проектного менеджмента и тренд на непрерывное совершенствование.
              Это исследование является полезным руководством, для тех, кто планирует трансформацию системы управления государства или организации.
            </p>
            <p>Для удобства применения опыта, в исследовании описывается ситуация, предшествующая трансформации,
              описываются поставленные задачи по изменению ситуации, а также совершенные действия и полученные результаты.
              В дополнении к этому описываются ключевые вызовы, ошибки, извлеченные уроки, а также практические рекомендации по внедрению проектного менеджмента в систему государственного управления.
            </p>
            <p>Опыт Казахстана показал необходимость управления трансформацией как проектом или программой проектов, а также применения инструментов и методов Change Management для управляемого выхода из зоны комфорта и минимизации сопротивления изменениям.
            </p>
            <h2>Маргулан Жумагалиев</h2>
            @elseif ( Config::get('app.locale') == 'en')
            <h1>Прочтение данного исследования вызывает чувства радости за значимые достижения Казахстана в области проектного менеджмента и тренд на непрерывное совершенствование.
              Это исследование является полезным руководством, для тех, кто планирует трансформацию системы управления государства или организации.
</h1>
            <p>Для удобства применения опыта, в исследовании описывается ситуация, предшествующая трансформации,
              описываются поставленные задачи по изменению ситуации, а также совершенные действия и полученные результаты.
              В дополнении к этому описываются ключевые вызовы, ошибки, извлеченные уроки, а также практические рекомендации по внедрению проектного менеджмента в систему государственного управления.
            </p>
            <p>Опыт Казахстана показал необходимость управления трансформацией как проектом или программой проектов, а также применения инструментов и методов Change Management для управляемого выхода из зоны комфорта и минимизации сопротивления изменениям.
            </p>
            <h2>Маргулан Жумагалиев</h2>
            @else
            <h1>Прочтение данного исследования вызывает чувства радости за значимые достижения Казахстана в области проектного менеджмента и тренд на непрерывное совершенствование.</h1>
          

            <p>    Это исследование является полезным руководством, для тех, кто планирует трансформацию системы управления государства или организации. Для удобства применения опыта, в исследовании описывается ситуация, предшествующая трансформации,
              описываются поставленные задачи по изменению ситуации, а также совершенные действия и полученные результаты.
              В дополнении к этому описываются ключевые вызовы, ошибки, извлеченные уроки, а также практические рекомендации по внедрению проектного менеджмента в систему государственного управления.
            </p>
            <p>Опыт Казахстана показал необходимость управления трансформацией как проектом или программой проектов, а также применения инструментов и методов Change Management для управляемого выхода из зоны комфорта и минимизации сопротивления изменениям.
            </p>
            <h2>Маргулан Жумагалиев</h2>
            @endif

          </div>
          <div class="about_research_photo">
            <img src="{{asset('/images/photo1681808557(1).jpeg')}}">
          </div>
        </div>
      </div>
    </div>
    <div class="books_block_container pt-5" id="books" >
      <div class="about_research_heading">

         @if ( Config::get('app.locale') == 'kz')
          <h1>Кітаптар</h1>
          @elseif ( Config::get('app.locale') == 'ru')
          <h1>Книги</h1>
          @elseif ( Config::get('app.locale') == 'en')
          <h1>Books</h1>
          @else
          <h1>Книги</h1>
        @endif
      </div>
      <div class="bookshelf">
        <img src="{{asset('/images/kaz.jpg')}}">
        <img src="{{asset('/images/en.jpg')}}">
        <img src="{{asset('/images/ru.jpg')}}">
      </div>
      <a href="#" class="cart_btn">{{__('main.add_to_cart')}}</a>
    </div>


@endsection


