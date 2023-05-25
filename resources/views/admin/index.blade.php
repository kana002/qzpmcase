<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>without bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  </head>
  <body>
  <div class="container ">
                            
                        
                            <div class="container-fluid">
                            <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Post id</th>
                          <th scope="col">Title id</th>
                          <th scope="col">description_kz</th>
                          <th scope="col">description_ru</th>
                          <th scope="col">description_en</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($posts as $post)
                        <tr>
                        <th scope="row">{{$post->id}}</th>   
                        <th scope="row">{{$post->title_id}}</th>  
                          <td>{{Str::limit($post->description_kz, 100)}}</td>
                          <td>{{Str::limit($post->description_ru, 50)}}</td>
                          <td>{{Str::limit($post->description_en, 50)}}</td>
                          @endforeach
                        </tr>
                       </tbody>
                    </table>
                    <hr>
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Title id</th>
                          <th scope="col">description_kz</th>
                          <th scope="col">description_ru</th>
                          <th scope="col">description_en</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($titles as $title)
                        <tr>
                        <th scope="row">{{$title->id}}</th>   
                          <td>{!!$title->title_kz!!}</td>
                          <td>{!!$title->title_ru!!}</td>
                          <td>{!!$title->title_en!!}</td>
                          @endforeach
                        </tr>
                        
                       </tbody>
                    </table>
                            
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
                            
                                                                                   
                                              
                                              <div class="col-7">
                                              <div class="row">
                                              <form method="POST" action="{{route('post.store', ['type'=>1])}}">
                                                    @csrf
                                                 <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label"><b>POST</b></label>
                                                
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">description_kz</label>
                                                    <textarea class="form-control" id="summernote_1" rows="3" name="description_kz"></textarea>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">description_ru</label>
                                                    <textarea class="form-control" id="summernote_2" rows="3"  name="description_ru"></textarea>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">description_en</label>
                                                    <textarea class="form-control" id="summernote_3" rows="3" name="description_en"></textarea>
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
                                                    <textarea class="form-control" id="summernote_4" rows="3" name="title_kz"></textarea>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">title_ru</label>
                                                    <textarea class="form-control" id="summernote_5" rows="3" name="title_ru"></textarea>
                                                  </div>
                                                  <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">title_en</label>
                                                    <textarea class="form-control" id="summernote_6" rows="3" name="title_en"></textarea>
                                                  </div>
                                                  <button type="submit" class="btn btn-primary">Submit</button>
                                                  </form>
                                              </div>
                                              
                                              </div>
                                            </div>
                            
                                           
                                </div>
    <script>
      $('#summernote_1').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#summernote_2').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#summernote_3').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
      });

        $('#summernote_4').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
      });

        $('#summernote_5').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],

      });

        $('#summernote_6').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        fontNames:['Arial'],
      });
    </script>
  </body>
</html>
