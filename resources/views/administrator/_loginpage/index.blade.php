<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrator Area</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css') }} -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('_css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @if(Session::has('status'))
              <script>
              window.setTimeout(function() {
                $(".alert-danger").fadeTo(700, 0).slideUp(700, function(){
                  $(this).remove();
                });
              }, 15000);
              </script>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>{{ Session::get('status') }}</strong>
                  </div>
                </div>
              </div>
            @endif

            <form action="{{ route('adm.auth.login.action') }}" method="POST">
              {{ csrf_field() }}
              <h1>Login Form</h1>
              <div>
                <input name="email" type="text" class="form-control" placeholder="Email" required />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required />
              </div>
              <div>
                <button class="btn btn-primary btn-block btn-flat">Log In</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                  <img src="{{ asset('asset/picture-default/porthole_co.png') }}" style="width: 60%;">
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

  </body>
</html>
