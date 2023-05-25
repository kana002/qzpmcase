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
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- include summernote css/js-->
    <link href="summernote-bs5.css" rel="stylesheet">
    <script src="summernote-bs5.js"></script>
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
    </style>
    </head>
    <body class="">
     
    <header>
      
    <div class="container ">
                            
                        
<div class="container-fluid">
  
  
            <div class="" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <b> ВЫЙТИ </b>
                                     </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
    
   Admin dashboard   
    </div>
   
    </header>


        <div class="container-fluid  " style="margin-top:20px">
            
                <div class="row vh-100">

                  <div class="col-2">
               
                block left
                  </div>
                
                  
                  <div class="col-7">
                  <div class="row">
                  <form method="POST" action="{{route('post.store', ['type'=>1])}}">
                        @csrf
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><b>POST</b></label>
                    
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">description_kz</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description_kz"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">description_ru</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="summernote" name="description_ru"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">description_en</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description_en"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

<b><hr></b><br>

                      <form method="POST" action="{{route('post.store', ['type'=>2])}}">
                        @csrf
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><b>TITLE</b></label>
                    
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">title_kz</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title_kz"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">title_ru</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title_ru"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">title_en</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title_en"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
                  
                  </div>
                </div>

               
    </div>



    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
      });
    </script>
</body>
</html>



@foreach($post->title as $title)
                        <th scope="row">{{$title->id}}</th>   
                            
                          <td>{{$title->title_kz}}</td>
                          <td>{{$title->title_ru}}</td>
                          <td>{{$title->title_en}}</td>
                          @endforeach
                        </tr>
                        