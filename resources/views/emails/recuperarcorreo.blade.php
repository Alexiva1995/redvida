<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <title></title>
  </head>
  <body>
      {{-- <div class="col-xs-12">
          <img src="{{asset('assets/img/logo-light.png')}}" height="80" alt="">
      </div> --}}
    <div class="">
      <h3>Cambiar Password {{$settings->name}}</h3>
      <br><br>
      <p>Por favor siga el siguiente link para el cambio de clave</p>
      <a href="{{route('autentication.reset-password', [$data['codigo']])}}">Recuperar Clave</a>
    </div>
  </body>
</html>
