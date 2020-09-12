@extends('layouts.user')

@section('titre')
Signal
@endsection



@section('content')
    <!-- Hero Area Start-->
    <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('../user/img/covid.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption ">
                                    <h1 class="text-secondary">Signaler</h1>
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
                        <div class="blog_left_sidebar col-lg-12 card-header bg-info">
                            <h4 class="m-b-0 text-white">signal</h4>
                        </div>
                        <br>
                    <div class="blog_left_sidebar">
                        <form action="{{route('signal')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-row mt-10">
								<div class="form-select col-md-6" >
									<select name="cat_id" class="form-control custom-select {{$errors->has('cat_id') ? 'is-invalid' : ''}}" value="{{old('cat_id')}}" required>
                                    <option >Catégorie</option>
									    @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->nom}}</option>
                                        @endforeach
                                        @if($errors->has('cat_id'))
                                            <div class="text-danger">
                                                {{ $errors->first('cat_id')}}
                                            </div>
                                        @endif
									</select>
                                </div>
                                <div class='col-md-6'>
                                    <input type="date" name="date" class="form-control single-input" name="trip-start" value="2020-02-01"  min="2020-02-01" max="2022-12-31">
                                </div>
                            </div>
                            <div class="form-row mt-10">
                                <div class="input-group-icon col-md-6">
                                    <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                    <div class="form-select">
                                        <select class="form-control" name="wilaya_id">
                                            <option value=" 1">Wilaya</option>
                                            @foreach ($wilayas as $w)
                                            <option value="{{$w->id}}">{{$w->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group-icon col-md-6">
                                    <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                    <input type="text" name="localisation" placeholder="Address" class="single-input {{$errors->has('localisation') ? 'is-invalid' : ''}}" value="{{old('localisation')}}">
                                    @if($errors->has('localisation'))
                                        <div class="text-danger" >
                                            <strong>{{ $errors->first('localisation')}}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-10">
                                <textarea class="single-textarea {{$errors->has('contenu') ? 'is-invalid' : ''}}" value="{{old('contenu')}}" placeholder="Message"  name="contenu"></textarea>
                                    @if($errors->has('contenu'))
                                        <div class="text-danger" >
                                            <strong>{{ $errors->first('contenu')}}</strong>
                                        </div>
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
                            <div class="form-group mt-10" style="text-align: center;">
                                <button type="submit" class="genric-btn info-border circle "><i class="fa fa-check"></i>Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
                

  <!-- JS here -->
        
@endsection