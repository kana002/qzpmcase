@extends('layouts.master', ['register' => 'active bg-secondary rounded'])
@section('content')

    <div id="centered-div">
    <h1>{{__('register.sign_up')}}</h1>
     <h2>{{__('register.new_accaunt')}}<a href="{{ route('login') }}">{{__('register.login')}}</a></h2>
     
      <div id="switch-container">
         <div class="switch switch-active" id="resident-switch">{{__('register.rezident_rk')}}</div>
        <div class="switch switch-active" id="non-resident-switch"><a style="text-decoration:none;" href="{{route('show.rezident')}}">{{__('register.non_rezident')}}</a></div>
        <div style="clear: both;"></div>
        <hr id="switch-stroke" />
      </div>
      <!-- ЭЦП -->
      <button id="digital-signature-button">ЭЦП</button>
      <form method="POST" action="{{ route('register.create', ['type'=>1]) }}">
             @csrf
      
            <div class="button-container">
            <input id="rez" type="text"  name="rez" hidden value="0">
             
              </div>
                    
    
        <div id="hidden" style="display:none">
        <input type="text" id="name" name="name" placeholder="Name">


        <input type="text" id="email" name="email" placeholder="Email">

        <input type="password" id="password-input" name="password" placeholder="{{__('register.password')}}">

        <input type="password" id="confirm-password-input" name="password_confirmation" placeholder="{{__('register.password_conf')}}">
        <button type="submit" id="submit-button">{{__('register.register')}}</button>
        </div>
      </form>
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

        $('#digital-signature-button').click(function (e) {
            e.preventDefault();
            if (webSocket.readyState === WebSocket.CLOSED) {
                //toastr["error"]('@lang('user.main.no_nca')');
                let timer = setInterval(function () {
                    console.log('timer');
                    if (webSocket.readyState === WebSocket.OPEN) {
                        $('#digital-signature-button').attr('disabled', false);
                        clearInterval(timer);
                    }
                    webSocket = new WebSocket('wss://127.0.0.1:13579/');
                }, 3000);
            }
            var selectedStorage = "PKCS12";
            getKeyInfo(selectedStorage, "getKeyInfoBack");
            $('#digital-signature-button').attr('disabled', true);
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
                           
                            $('#digital-signature-button').hide();
                            $('#submit-button').show();
                            $('#hidden').show();
                            $('#name').show();
                            $('#login').show();
                            $('#country').show();
                            $('#citixenship').show();
                            $('#password').show();
                            $('#password-confirm').show();
                            $( "input#name").val(subjectCn.split(' ')[1]);
                            // $( "input#name").val(subjectCn);
                           

                            // console.log($re);
                        //    console.log('444',  data);
                          
                          
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
     
    
      const residentSwitch = document.getElementById("resident-switch");
      const nonResidentSwitch = document.getElementById("non-resident-switch");
    //   const switchStroke = document.getElementById("switch-stroke");
    //   const digitalSignatureButton = document.getElementById("digital-signature-button");
    //   const registrationForm = document.getElementById("registration-form");
      
      residentSwitch.addEventListener("click", () => {
    //     // Set the active switch and show/hide appropriate elements
        residentSwitch.classList.add("switch-active");
        nonResidentSwitch.classList.remove("switch-active");
    //     // digitalSignatureButton.style.display = "block";
    //     digitalSignatureButton.style.marginLeft = "60px";
    //     registrationForm.style.display = "none";
      });
      
      nonResidentSwitch.addEventListener("click", () => {
    //     // Set the active switch and show/hide appropriate elements
        nonResidentSwitch.classList.add("switch-active");
        residentSwitch.classList.remove("switch-active");
    //     digitalSignatureButton.style.display = "none";
    //     registrationForm.style.display = "block";
      });
    // const nonResidentSwitch = document.getElementById("non-resident-switch");
    // residentSwitch.addEventListener("click", () => {
    //     nonResidentSwitch.style.display = "block";
    // }
    </script>
@endsection
