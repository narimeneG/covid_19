
<div class="col-lg-4">
    <div class="blog_right_sidebar">
        
        <!-- Ajouter idées-->
        <aside class="single_sidebar_widget search_widget">
            <button type="button" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" data-toggle="modal" data-target="#modal1">Ajouter une idée</button>
        </aside>
        <!-- Catégories -->
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Catégorie</h4>
            <ul class="list cat-list">
                @foreach($cats as $c)
                    <li>
                        <a href="{{ url('idéesCatégorie/'.$c->id.'/show') }}" class="d-flex">{{ $c->nom }}</a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <!-- Idées -->
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Recent Idée</h3>
            @foreach($ids as $i)
            <div class="media post_item">
                @if($i->image != null)
                <img src="{{asset('/'.$i->image)}}" width="50" height="50" alt="post">
                @endif
                <div class="media-body">
                    <a href="single-blog.html">
                        <h3>{{ $i->titre }}</h3>
                    </a>
                    <p>{{ $i->created_at }}</p>
                </div>
            </div>
            @endforeach
            <br>
            <p class="text-center"><a href="{{url('idée')}}" class="text-dark">Afficher plus</a></p>
        </aside>
        <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                <li>
                    <a href="#">project</a>
                </li>
                <li>
                    <a href="#">love</a>
                </li>
                <li>
                    <a href="#">technology</a>
                </li>
                <li>
                    <a href="#">travel</a>
                </li>
                <li>
                    <a href="#">restaurant</a>
                </li>
                <li>
                    <a href="#">life style</a>
                </li>
                <li>
                    <a href="#">design</a>
                </li>
                <li>
                    <a href="#">illustration</a>
                </li>
            </ul>
        </aside>
        <aside class="single_sidebar_widget instagram_feeds">
            <h4 class="widget_title">Photos</h4>
            <ul class="instagram_row flex-wrap">
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{asset('../uploads/info/coronavirus-protection-mask-vector.jpg')}}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{asset('../user/img/gettyimages-1212213054-2048x2048.jpg')}}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{asset('../uploads/admin/1.jpg')}}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{asset('../uploads/users/4.jpg')}}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{asset('../user/img/3.jpg')}}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{asset('../user/img/4.jpg')}}" alt="">
                    </a>
                </li>
            </ul>
        </aside>
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
                                        @foreach ($cats as $cat)
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