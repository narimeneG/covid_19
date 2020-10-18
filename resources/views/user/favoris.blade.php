@extends('layouts.user')

@section('titre')
favoris
@endsection

@section('content')

    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="../user/img/covid.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption ">
                                <h1 class="text-secondary">Favoris</h1>
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
                    <div class="blog_left_sidebar">
                        @foreach($infos as $info)
                            <article class="blog_item">
                                <div class="row py-2">
                                    <div class="col-lg-4"><img src="../user/img/photo/Coronavirus.jpg" class="rounded-circle " width="50" height="50">&nbsp;COVID-19<span></div>
                                    <div class="col-lg-6"> </div>
                                    <div class="col-lg-2 py-3">{{ $info->date }}</div>
                                </div>
                                @if($info->image)
                                    <div class="blog_item_img">
                                        <a href="{{asset('/'.$info->image)}}" class="img-pop-up card-img rounded-0" >
                                            <div class="single-gallery-image"><img width="100%" height="100%" alt="user" src="{{asset('/'.$info->image)}}"></div>
                                        </a>
                                    </div>
                                @endif
                                <?php
                                    $favoris_status = 'btn_f';
                                ?>
                                @if($info->titre || $info->contenu || $info->sou_id != null)
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>{{ $info->titre }}</h2>
                                        </a>
                                        <p>{{ $info->contenu }}</p>
                                        @if($info->sou_id != null) <p>{{$info->source}}</p> @else <p></p> @endif
                                        <div class="button-group-area mt-10">
                                            <button tpye="button" data-infoid="{{ $info->id }}_l" data-favoris="{{ $favoris_status }}" class="button rounded-0 primary-bg text-white {{ $favoris_status }} boxed-btn favoris">
                                                <i class="fa fa-heart-o"></i> Favoris
                                            </button>
                                            <a href="#"><i class="fa fa-comments"></i> 03 Comments</a>
                                            <a href="#"><i class="fa fa-share-alt"></i> Partager</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="blog_details">
                                        <div class="button-group-area mt-10">
                                            <button tpye="button" data-infoid="{{ $info->id }}_l" data-favoris="{{ $favoris_status }}" class="button rounded-0 primary-bg text-white {{ $favoris_status }} boxed-btn favoris">
                                                <i class="fa fa-heart-o"></i> Favoris
                                            </button>
                                            <a href="#"><i class="fa fa-comments"></i> 03 Comments</a>
                                            <a href="#"><i class="fa fa-share-alt"></i> Partager</a>
                                        </div>
                                    </div>  
                                @endif
                            </article>
                        @endforeach
                        
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $infos->links('vendor.pagination.paginate') }}
                        </nav>
                    </div>
                </div>

<!-- JS here -->
<script src="{{asset('js/app.js')}}"></script> 
<script src="{{ asset('../assets/js/jquery.min.js' )}}"></script>    
<script>
    var token = "{{ Session::token() }}";
    $('.favoris').on('click', function () {
        var favoris_s = $(this).attr('data-favoris');
        var info_id = $(this).attr('data-infoid');
        info_id = info_id.slice(0, -2);
        
        $.ajax({
            type: 'POST',
            url: "{{ route('favoris') }}",
            data: {favoris_s: favoris_s, info_id: info_id, _token: token},

            success: function(data){
                if(data.is_favoris == 1){
                    //alert("add");
                    $('*[data-infoid="'+ info_id +'_l"]').removeClass('btn_1').addClass('btn_f');
                }
                if(data.is_favoris == 0){
                    //alert("supprimer");
                    $('*[data-infoid="'+ info_id +'_l"]').removeClass('btn_f').addClass('btn_1');
                }
            }
        });
        
    });
</script>          
@endsection