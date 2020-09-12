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
    <link href="{{asset('../user/node_modules/register-steps/steps.css')}}" rel="stylesheet">
    <link href="{{asset('../user/css/register3.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('../user/css/style.min.css')}}" rel="stylesheet">
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
<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Covid-19</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="javascript:void(0)" class="text-center m-b-40"><img src="../user/img/logo-icon.png" alt="Home" /><br/><img src="../user/img/logo-text.png" alt="Home" /></a>
                <!-- multistep form -->
                <form id="msform" class="form p-t-2" method="POST" action="{{ route('inscription') }}">
                        {{ csrf_field() }}
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Creer un compte</li>
                        <li>Profile personnel</li>
                        <li>Details Personal </li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Creer un compte</h2>
                        <h3 class="fs-subtitle">Etap 1</h3>
                        <input type="text" name="email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Profile personnel</h2>
                        <h3 class="fs-subtitle">Etap 2</h3>
                        <input type="text" name="nom" placeholder="Nom" />
                        <input type="text" name="prenom" placeholder="Prénom" />
                        <input type="file" name="image" onchange="" accept="image/*" >
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Details Personnel </h2>
                        <h3 class="fs-subtitle">Etap 3</h3>
                        <div class="form-group">
                            <h4 class="text-left">Commune</h4>
                            <select class="form-control">
                                @foreach ($communes as $c)
                                       
                                    <option value="{{$c->id}}">{{$c->nom}} </option>
                                    
                                    @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <h4 class="text-left">La profession</h4>
                            <select class="form-control">
                                @foreach ($profs as $prof)
                                       
                                    <option value="{{$prof->id}}">{{$prof->nom}} </option>
                                    
                                    @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <h4 class="text-left">Le maladies</h4>
                            <select class="form-control">
                            @foreach ($maladies as $m)
                                <option value="{{$m->id}}">{{$m->nom}} </option>
                            @endforeach
                            </select>
                          </div>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="submit" name="submit" class="submit action-button" value="Submit" />
                    </fieldset>
                </form>
                <div class="clear"></div>
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
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('../user/node_modules/register-steps/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('../user/node_modules/register-steps/register-init.js') }}"></script>
    <script type="text/javascript">
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
</body>

</html>