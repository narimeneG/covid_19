<?php
    use App\Maladie;
    use App\Commune;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('../user/img/favicon.ico')}}">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    
    <!-- page css -->
    <link href="{{ asset('../user/css/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{asset('../user/css/inscr.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('../user/css/style.min.css')}}" rel="stylesheet">
    <!-- select2 -->
    <link href="{{asset('../dist/css/parsley.css')}}" rel="stylesheet">
    <link href="{{asset('../dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
        @php
            $profs = DB::table('professions')->get();
            $maladies = Maladie::all();
            $communes = Commune::all();
        @endphp
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">covid_19</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../user/img/mmm.jpg);">
        <div class="login-box card">
            <div class="card-body inscrir">
                <h1 class="box-title m-t-10 m-b-0 text-center">Inscription</h1>
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('inscription') }}">
                        {{ csrf_field() }}
                    <div class="form-row m-t-20">
                        <div class="col">
                            <input class="form-control {{$errors->has('nom') ? 'is-invalid' : ''}}" type="text" name="nom" required="" placeholder="Nom">
                            @if ($errors->has('nom'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col">
                            <input class="form-control {{$errors->has('prenom') ? 'is-invalid' : ''}}" type="text" name="prenom" required="" placeholder="Prénom">
                            @if ($errors->has('prenom'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-t-10">
                        <div class="col-xs-12">
                            <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" required="" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="col">
                            <input class="form-control {{$errors->has('pasword') ? 'is-invalid' : ''}}" type="password" name="password" required="" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col">
                            <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group m-t-10">
                            <select class="form-control {{$errors->has('com_id') ? 'is-invalid' : ''}}" name="com_id">
                                @foreach ($communes as $c)
                                    <option value="{{$c->id}}">{{$c->nom}} </option>
                                @endforeach
                            </select>
                            @if ($errors->has('com_id'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('com_id') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <select class="form-control {{$errors->has('pro_id') ? 'is-invalid' : ''}}" name="pro_id">
                            @foreach ($profs as $prof)
                                <option value="{{$prof->id}}">{{$prof->nom}} </option>
                                @endforeach
                        </select>
                        @if ($errors->has('pro_id'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('pro_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group ">
                        <label>Maladies</label>
                        <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                            @foreach($maladies as $mal)
                                <option value='{{ $mal->id }}'>{{ $mal->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center m-t-15">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Enregister</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Vous etes deja inscrit <a href="{{ url('/login') }}" class="text-info m-l-5"><b>Connectez Vous</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('../user/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('../user/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('../user/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    <!-- select2 -->
    <script src="{{ asset('../dist/js/parsley.min.js') }}"></script>
    <script src="{{ asset('../dist/js/select2.min.js') }}"></script>
    <script type="text/javascript">
		$('.select2-multi').select2();
	</script>
</body>

</html>