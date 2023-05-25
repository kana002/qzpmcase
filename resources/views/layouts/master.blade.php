<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'qzpmcase') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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

            .layer {
            overflow: scroll; /* Добавляем полосы прокрутки */
            width: 1000px; /* Ширина блока */
            height: 150px; /* Высота блока */
            padding: 5px; /* Поля вокруг текста */
            border: solid 1px black; /* Параметры рамки */
            }
        </style>
    </head>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <!--<a class="navbar-brand"  href="/">{{__('main.home')}}</a>-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li><a class="nav-link" href="/#">{{__('main.home')}}</a></li>
                <li><a class="nav-link" href="/#about_visible" id="about_switcher">{{__('main.about')}}</a></li>
                <li><a class="nav-link" href="/#books">{{__('main.books')}}</a></li>
                <li><a class="nav-link" href="{{route('show.reviews')}}">{{__('main.reviews')}}</a></li>
                <li><a class="nav-link" href="/">{{__('main.events')}}</a></li>
                <li><a class="nav-link" href="/">{{__('main.contacts')}}</a></li>
                @guest
                {{--@if (Route::has('register'))--}}
                <li><a class="nav-link" href="{{route('register')}}">{{__('main.log_in')}}</a></li>
                {{--@endif--}}
                @endguest
                @auth
                <li class="nav-item dropdown" id="nav-items" >
                                <a class="nav-link" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{__('main.log_out')}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endauth
                            <li> <a class="nav-link active"  href="{{route('locale', 'kz')}}">KZ</a></li>
                            <li> <a class="nav-link active"  href="{{route('locale', 'ru')}}">RU</a></li>
                            <li> <a class="nav-link active"  href="{{route('locale', 'en')}}">EN</a></li>
       </div>
      </div>
    </nav>
</header>
  

            @yield('content')

        @yield('scripts')

        <script>

const about_block = document.getElementById("about_visible");
const aboutSwitcher = document.getElementById("about_switcher");
const image = document.querySelector('.anim_image');

aboutSwitcher.addEventListener("click", () => {
    about_block.style.display = "block";
});


function myFunction() {
document.getElementById("alert").style.display = "block";
};

            function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
            };


        </script>
    </body>
</html>
