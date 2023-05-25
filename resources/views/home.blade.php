@extends('layouts.master', ['home' => 'active bg-secondary rounded'])
@section('content')

<div class="home_container">
            <div class="spacer">

            </div>
            <div class="home_text">
                    <h1>QAZAQSTAN</h1>
                    <h1>COUNTRY CASE</h1>
                    <p>The key objective of the case is to substantiate the need to transform the public administration system and create an atmosphere of urgency on the part of the leadership of the state bodies of Kazakhstan.
                    </p>
            </div>
            <div class="home_image">
                <img src="{{asset('/images/rus.jpg')}}">
            </div>
        </div>
        <div class="home2_container">
            <div class="toks-container">
            <div class="left_image">
                <img src="{{asset('/images/rus.jpg')}}" class="anim_image">
            </div>
            <div class="right_text">
                <p>The challenges and experiences of overcoming resistance described in the case, lessons learned, analysis of failures, practical recommendations are valuable not only for the Kazakh, but also for the international audience, government leaders, experts and practitioners in the field of change management and project management.
                   <br> Disclosure of such information is rare when describing the experience of different countries, mostly the authors share their victories and successes.</p>
                   <br>
                <p>INTRODUCTION<br>
                    CHAPTER 1. PROJECT MANAGEMENT IMPLEMENTATION EXPERIENCE <br>
                    CHAPTER 2. CHALLENGES AND PRACTICAL RECOMMENDATIONS <br>
                    CONCLUSION <br>
                    LIST OF REFERENCES <br>
                    </p>
            </div>
            </div>
            <div class="scrollable-area">
                <div class="text-container">
                    <h3>ГЛАВА 1. ОПЫТ ВНЕДРЕНИЯ ПРОЕКТНОГО МЕНЕДЖМЕНТА</h3>
                    <p>В работе описаны вызовы, ошибки и уроки, извлеченные в процессе внедрения проектного менеджмента в Казахстане на предыдущих этапах, а также дана характеристика текущему ходу имплементации. 
                    <br><strong>Поддержка «сверху-вниз»</strong><br>
                    <strong>Ситуация</strong><br>
                    Первый этап (1997–2017 гг.) можно считать началом формирования НСПУ и накопления в стране
                    </p>
                </div>
            </div>
            <div class="reactions_container">
                <div class="reactions_list">
                    <a href="#"><img src="{{asset('/images/1.svg')}}"></a>
                    <a href="#"><img src="{{asset('/images/2.svg')}}"></a>
                    <a href="#"><img src="{{asset('/images/3.svg')}}"></a>
                    <a href="#"><img src="{{asset('/images/5.svg')}}"></a>
                    <a href="#"><img src="{{asset('/images/4.svg')}}"></a>

                </div>
            </div>
        </div>
        <div class="about_container" id="about_research">
            <div class="about_research_heading">
                <h1>About Research</h1>
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
                    <img src="{{asset('/images/IMG_3525.JPG')}}">
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
                    <img src="{{asset('/images/photo1681808557 (1).jpeg')}}">
                </div>

            </div>
        </div>
        <div class="books_block_container" id="books">
            <div class="about_research_heading">
                <h1>Books</h1>
            </div>
            <div class="bookshelf">
                <img src="{{asset('/images/rus.jpg')}}">
                <img src="{{asset('/images/rus.jpg')}}">
                <img src="{{asset('/images/rus.jpg')}}">
            </div>

            <a href="#" class="cart_btn">Add to Cart</a>

        </div>
@endsection
