<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">



</style>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<body>
   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
              Bem vindo
            </h1>
            <h2 class="wv-heading--subtitle">
             BrisaFone Cover
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="/login" method="post" name="login">
                  
                  <div class="form-group">
                     <input type="text" name="cpf"  class="form-control my-input" id="cpf" placeholder="CPF">
                  </div>
                  
                  <div class="form-group">
                     <input type="password" name="password"  class="form-control my-input" id="password" placeholder="Senha">
                  </div>

                  <div class="text-center ">
                     <button type="submit" class=" btn btn-block send-button tx-tfm">Entrar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>