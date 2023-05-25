@extends('layouts.master', ['register' => 'active bg-secondary rounded'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Регистрация</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
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
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Регистрация
                                </button>
                            </div>
                            <div class="row pt-4">
                            <div class="row pt-4">
        <div class="form-group col">
            <button id='sign_document' class="btn btn-success">ЭЦП</button>
        </div>
    </div>
                        </div>
                    </form>
                </div>
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
                var subjectDn = res['subjectDn'];
                var subjectSn = res['subjectCn'];
                var dateString = res['certNotAfter'];
                var iin = subjectDn.replace(new RegExp('.*' + 'IIN'), '');

                date = new Date(Number(dateString));
                var now = new Date();
            
                var selectedStorage = "PKCS12";
                var sign = result['responseObject'];
                var subjectCn = res['subjectCn'];
                formData.append('sign', sign);
                
                if (date > now) {
                    $.ajax({
                        url: '{{Route::has('register')}}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            console.log('444', iin, data)
                            if (iin.substr(0, 12) == user_iin)
                            {
                                createCAdESFromBase64(selectedStorage, "SIGNATURE", data.pdf, true, "createCAdESFromBase64Back");
                            }
                            else
                            {
                                alert("Вы используете ключ другого пользователя");
                            }
                        },
                        error: function (data) {
                            console.log(data)
                            alert("Нет данных для подписи!");
                        }
                    });
                } else {
                    alert("Просрочен ключ эцп");
                }
            }
        }
    </script>
@endsection
