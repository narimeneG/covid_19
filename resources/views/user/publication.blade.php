@extends('layouts.user')

@section('titre')
publication
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
                                <h1 class="text-secondary">Publications</h1>
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
                                @if($info->titre || $info->contenu || $info->sou_id != null)
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2>{{ $info->titre }}</h2>
                                        </a>
                                        <p>{{ $info->contenu }}<br><br>
                                        @if($info->sou_id != null) {{$info->source->nom}} @else <p></p> @endif
                                        </p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-heart-o"></i> Favoris</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"></i> Partager</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="single-blog.html">
                                            <h2></h2>
                                        </a>
                                        <p>
                                        </p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="fa fa-heart-o"></i> Favoris</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                            <li><a href="#"><i class="fa fa-share-alt"></i> Partager</a></li>
                                        </ul>
                                    </div>  
                                @endif
                            </article>
                        @endforeach
                        
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $infos->links('vendor.pagination.paginate') }}
                        </nav>
                    </div>
                </div>
                
            
    @endsection