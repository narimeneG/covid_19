@extends('layouts.user')

@section('titre')
    idéesCatégorie
@endsection

@section('content')
    <?php
        use App\Categorie;
    ?>
        @php
            $categories = Categorie::all();
        @endphp
    <!-- Hero Area Start-->
    <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('../user/img/covid.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption ">
                                    <h1 class="text-secondary">Les idées</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- section-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar col-lg-8">
                            <button type="button" class="btn " data-toggle="modal" data-target="#modal1">Ajouter une idée</button>
                    </div>
                    <div class="blog_left_sidebar">
                        @foreach ($idees as $i)
                            <article class="blog_item">
                                <div class="col-lg-12">
                                    <div class="row py-2">
                                        <div class="col-lg-4">
                                            @if($i->user->image)
                                                <img src="{{asset('/'.$i->user->image)}}" class="rounded-circle " width="50" height="50">
                                            @else 
                                                <img src="{{asset('frontend/images/avatar.jpeg')}}" width="50" height="50"  class="rounded-circle">
                                            @endif
                                            &nbsp;{{ $i->user->nom}}&nbsp;{{ $i->user->prenom}}<span>
                                        </div>
                                        <div class="col-lg-5"> </div>
                                        <div class="col-lg-3 py-3">{{$i->date}}</div>
                                    </div>
                                </div>
                                @if($i->image)
                                    <div class="blog_item_img">
                                        <a href="{{asset('/'.$i->image)}}" class="img-pop-up card-img rounded-0" >
                                            <div class="single-gallery-image"><img width="100%" height="100%" alt="user" src="{{asset('/'.$i->image)}}"></div>
                                        </a>
                                    </div>
                                    <!--div class="blog_item_img"></div-->
                                @endif
                                <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>{{$i->titre}}</h2>
                                    </a>
                                    <p>{{$i->contenu}}</p>

                                    <?php
                                        $like_count = 0;
                                        $dislike_count = 0;

                                        $like_status = 'info-border';
                                        $dislike_status = 'info-border';
                                    ?>
                                    @foreach ($i->likes as $like)
                                        <?php
                                            if($like->like == 1)
                                                $like_count++;
                                            
                                            if($like->like == 0)
                                                $dislike_count++;
                                            if(Auth::check()){
                                                if($like->like == 1 && $like->cit_id == Auth::user()->id)
                                                $like_status = 'info';
                                                
                                                if($like->like == 0 && $like->cit_id == Auth::user()->id)
                                                    $dislike_status = 'info';
                                            }
                                            
                                            
                                        ?>
                                    @endforeach

                                    <div class="button-group-area mt-10">
                                        <button type="button" data-ideeid="{{ $i->id }}_l" data-like="{{ $like_status }}" class="genric-btn {{ $like_status }} e-large like">
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span class="like_count">{{ $like_count }}</span>
                                        </button>
                                        <button type="button"  data-ideeid="{{ $i->id }}_d" data-dislike="{{ $dislike_status }}" class="genric-btn {{ $dislike_status }} e-large dislike">
                                            <i class="fa fa-thumbs-o-down" aria-hidden="true"></i><span class="dislike_count"> {{ $dislike_count }} </span>
                                        </button>
                                        <a href="#" ><i class="fa fa-share-alt"></i> Partager</a>
                                    </div>
                                </div>
                                
                            </article>
                        @endforeach

                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $idees->links('vendor.pagination.paginate') }}
                        </nav>
                    </div>
                </div>
                

    <!-- modal idee-->
    <div id="modal1" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Nouvelle idée</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('idée')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>titre</label>
                                <input type="text" class="form-control {{$errors->has('titre') ? 'is-invalid' : ''}}" name="titre" placeholder="titre de l'idée" value="{{old('titre')}}">
                                    @if($errors->has('titre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titre')}}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Catégorie</label>
                                    <div class="default-select" id="default-select">
                                        <select class="form-control " name="cat_id" value="{{old('cat_id')}}">
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label >Contenu</label>
                            <textarea placeholder="saisir contenu de l'idée" name="contenu" id="contenu" class="form-contro col-sm-12 rounded {{$errors->has('contenu') ? 'is-invalid' : ''}}" rows="3" value="{{old('contenu')}}"></textarea>
                            @if($errors->has('contenu'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contenu')}}</strong>
                                        </span>
                                @endif
                        </div>
                        <div class="form-row">
                            <div class="card-body">
                                <label for="input-file-now">Photo</label>
                                <input type="file" id="input-file-now" class="dropify {{$errors->has('image') ? 'is-invalid' : ''}}" name="image" />
                            </div>
                                @if($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image')}}</strong>
                                </span>
                                @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn danger" data-dismiss="modal">fermer</button>
                        <button type="submit" class="genric-btn primary">enregistrer</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
  <!-- JS here -->
  <script src="{{asset('js/app.js')}}"></script>
<script>
    var token = "{{ Session::token() }}";

	$('.like').on('click', function () {
        var like_s = $(this).attr('data-like');
        var idee_id = $(this).attr('data-ideeid');
        idee_id = idee_id.slice(0, -2);
        //alert(idee_id);

        $.ajax({
            type: 'POST',
            url: "{{ route('like') }}",
            data: {like_s: like_s, idee_id: idee_id, _token: token},

            success: function(data){
                if(data.is_like == 1){
                    $('*[data-ideeid="'+ idee_id +'_l"]').removeClass('info-border').addClass('info');
                    $('*[data-ideeid="'+ idee_id +'_d"]').removeClass('info').addClass('info-border');

                    var cu_like = $('*[data-ideeid="'+ idee_id +'_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like)+1;
                    $('*[data-ideeid="'+ idee_id +'_l"]').find('.like_count').text(new_like);
                
                    if(data.change_like == 1){
                        var cu_dislike = $('*[data-ideeid="'+ idee_id +'_d"]').find('.dislike_count').text();
                        var new_dislike = parseInt(cu_dislike)-1;
                        $('*[data-ideeid="'+ idee_id +'_d"]').find('.dislike_count').text(new_dislike);
                    }
                }
                if(data.is_like == 0){
                    $('*[data-ideeid="'+ idee_id +'_l"]').removeClass('info').addClass('info-border');

                    var cu_like = $('*[data-ideeid="'+ idee_id +'_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like)-1;
                    $('*[data-ideeid="'+ idee_id +'_l"]').find('.like_count').text(new_like);
                }
            }
        });
        
    });

    $('.dislike').on('click', function () {
        var dislike_s = $(this).attr('data-dislike');
        var idee_id = $(this).attr('data-ideeid');
        idee_id = idee_id.slice(0, -2);
        //alert(idee_id);

        $.ajax({
            type: 'POST',
            url: "{{ route('dislike') }}",
            data: {dislike_s: dislike_s, idee_id: idee_id, _token: token},

            success: function(data){
                //alert(data.is_dislike);
                if(data.is_dislike == 1){
                    $('*[data-ideeid="'+ idee_id +'_d"]').removeClass("info-border").addClass("info");
                    $('*[data-ideeid="'+ idee_id +'_l"]').removeClass("info").addClass("info-border");

                    var cu_dislike = $('*[data-ideeid="'+ idee_id +'_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_dislike)+1;
                    $('*[data-ideeid="'+ idee_id +'_d"]').find('.dislike_count').text(new_dislike);
                
                    if(data.change_dislike == 1){
                        var cu_like = $('*[data-ideeid="'+ idee_id +'_l"]').find('.like_count').text();
                        var new_like = parseInt(cu_like)-1;
                        $('*[data-ideeid="'+ idee_id +'_l"]').find('.like_count').text(new_like);
                    }
                }
                if(data.is_dislike == 0){
                    $('*[data-ideeid="'+ idee_id +'_d"]').removeClass('info').addClass('info-border');

                    var cu_dislike = $('*[data-ideeid="'+ idee_id +'_d"]').find('.dislike_count').text();
                    var new_dislike = parseInt(cu_dislike)-1;
                    $('*[data-ideeid="'+ idee_id +'_d"]').find('.dislike_count').text(new_dislike);
                }
            }
        });
        
    });
</script> 
@endsection