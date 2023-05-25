@extends('layouts.master', ['register' => 'active bg-secondary rounded'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>
                <div class="card-header"><a href="{{route('register')}}"> РЕЗИДЕНТ РК </a>      <a href="" id="norezid"  style="float:right"> НЕРЕЗИДЕНТ РК </a></div>
                <div class="card-body">
                    <form method="POST" action="{{route('register')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>
                            <input id="rez" type="text"  name="rez" hidden value="1">
                            <div class="col-md-6" id="fullname">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">Страна</label>

                            <div class="col-md-6" id="country">
                                <!-- <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="name" autofocus> -->
                                <select class="form-select" aria-label="Default select example" 
                                            name="country_id"
                                            autocomplete="country">
                                 <option selected>Выберите один из вариантов</option>
                                 @foreach($coutries as $key => $country)
                                        <option value="{{$country->id}}">{{$country->name_ru}}</option>
                                 @endforeach
                                    </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="citizenship" class="col-md-4 col-form-label text-md-end">Гражданство</label>

                            <div class="col-md-6" id="citizenship">
                                <!-- <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="name" autofocus> -->
                                <select class="form-select" aria-label="Default select example"
                                            name="citizenship_id"
                                            autocomplete="citizenship" >
                                 <option selected>Выберите один из вариантов</option>
                                 @foreach($coutries as $key => $country)
                                        <option value="{{$country->id}}">{{$country->__('name')}}</option>
                                 @endforeach
                                    </select>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Логин(email)</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Повторите пароль</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4" id="register" >
                                <button type="submit"  class="btn btn-primary" >
                                   Регистрация
                                </button>
                            </div>
                        
         <!-- <div class="col-md-6 offset-md-4">
            <button type="submit" id='sign_document' class="btn btn-success">Выбрать ЭЦП</button>
        </div> -->
    </div>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script
src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
    <script src="../libs/ncalayer.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#sign_document').click(function (e) {
            e.preventDefault();
            if (webSocket.readyState === WebSocket.CLOSED) {
                //toastr["error"]('@lang('user.main.no_nca')');
                let timer = setInterval(function () {
                    console.log('timer');
                    if (webSocket.readyState === WebSocket.OPEN) {
                        $('#sign_document').attr('disabled', false);
                        clearInterval(timer);
                    }
                    webSocket = new WebSocket('wss://127.0.0.1:13579/');
                }, 3000);
            }
            var selectedStorage = "PKCS12";
            getKeyInfo(selectedStorage, "getKeyInfoBack");
            $('#sign_document').attr('disabled', true);
        });

        function getKeyInfoBack(result) {
            console.log('123456', result)
            if (result['code'] === "500") {
                alert(result['message']);
            } else if (result['code'] === "200") {
                var res = result['responseObject'];
                var subjectCn = res['subjectCn'];
                dateString = res['certNotAfter'];
                // var subjectDn = res['subjectDn'];
                // var subjectSn = res['subjectCn'];
                // var dateString = res['certNotAfter'];
                //var iin = subjectDn.replace(new RegExp('.*' + 'IIN'), '');

                //  date = new Date(Number(dateString));
                var now = new Date();
            
                var selectedStorage = "PKCS12";
          
                var sign = result['responseObject'];
                var subjectCn = res['subjectCn'];

                let formData = new FormData();
                formData.append('subjectCn', subjectCn);
                
                // if (date > now) {
                    $.ajax({
                        url: '{{route('register.store')}}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                           
                            $('#sign_document').hide();
                            $('#register').show();
                            $( "input#name").val(subjectCn);

                           console.log('444',  data);
                          
                          
                        },

                        
                        // error: function (data) {
                        //     console.log(data)
                        //     alert("Нет данных для подписи!");
                        // }
                    });
                    
                // } else {
                //     alert("Просрочен ключ эцп");
                // }
            }
        
        }

        // $('a#norezid').click(function(){ 
            
        //     document.getElementById('.card-body').style.display = "none";
          
        // });
       
    </script>
@endsection
