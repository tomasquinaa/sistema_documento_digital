<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
  </head>
  <body>



        <div class="login-box">
        <h3>Sistema Documento Digital</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="email" placeholder="Email"  type="email" name="email" :value="old('email')">
            </div>
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif 
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Palavra passe"  type="password"
                name="password">
            </div>
            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif 

            <input type="submit" class="btn" value="Entrar">
        </form>
        
        </div>

  
  </body>
</html>
