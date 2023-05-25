<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <style>
    .password-control {
	position: absolute;
	top: 11px;
	right: 6px;
	display: inline-block;
	width: 20px;
	height: 20px;
	background: url(/view.svg) 0 0 no-repeat;
}
.password-control.view {
	background: url(/no-view.svg) 0 0 no-repeat;
}

/* scrol */
.layer {
    overflow: scroll; /* Добавляем полосы прокрутки */
    width: 1000px; /* Ширина блока */
    height: 150px; /* Высота блока */
    padding: 5px; /* Поля вокруг текста */
    border: solid 1px black; /* Параметры рамки */
   } 
  </style>
    </style>
    </head>
    <body class="">
     
    <header>
    <div class="container ">
    <nav class="navbar navbar-expand-lg bg-light">
<div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
        <li class="nav-item">
          <a class="nav-link active"  href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="#">{{__('main.about')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('show.reviews')}}">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="#">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="{{route('locale', 'ru')}}">ru</a>
          <a class="nav-link active"  href="{{route('locale', 'kz')}}">kz</a>
          <a class="nav-link active"  href="{{route('locale', 'en')}}">en</a>
          <!-- <a class="nav-link active"  href="{{route('locale', __('main.set_lang'))}}">{{__('main.set_lang')}}</a> -->
        </li>
       
      
      </ul>
      

    @guest
            @if (Route::has('login'))
            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                               </li>          
               @endif
                 
                @if (Route::has('register'))
                                <li class="nav-item" style="margin-left:10px" >
                                    <a class="nav-link" href="{{ route('register') }}">РЕГИСТРАЦИЯ</a>
                    
                                </li>
                            @endif
                             @else
                            <li class="nav-item dropdown" id="nav-items" >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ВЫЙТИ
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </div>
                </div>
          </div>
  </div>
</nav>
    </div>
    </div>
    </nav>
    </div>
    </header>


        <div class="container-fluid  " style="margin-top:20px">
            
                <div class="row vh-100">

                  <div class="col-2">
               
                
                  </div>
                
                  
                  <div class="col-7">
                 
                        @yield('content')
                        
                  </div>
                  <div class="col-3">
                  <b>right block</b>
                  </div>
                </div>

               
    </div>




   


@yield('scripts')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
  
/* Цикл через все кнопки выпадающего списка для переключения между скрытием и отображением его выпадающего содержимого - это позволяет пользователю иметь несколько выпадающих списков без каких-либо конфликтов */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}


</script> 
</body>
</html>
