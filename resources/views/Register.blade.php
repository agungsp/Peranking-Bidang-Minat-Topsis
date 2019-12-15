<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Register - Peranking Bidang Minat [Skripsi]</title>
        <!-- Custom fonts for this template-->
        <link href="/sbAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="/sbAdmin/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            @if ($msgType != '')
                {{-- <div class="row"> --}}
                    <div class="col-8 mx-auto mt-3">
                        <div class="alert alert-{{$msgType}} alert-dismissible fade show" role="alert">
                            <strong>{{ucwords($msgType)}}</strong> {{$msgStr}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                {{-- </div> --}}
            @endif
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="/Register" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputNPM" name="npm" class="form-control input-npm" placeholder="NPM" required="required" autofocus="autofocus" value="{{ old('npm') }}">
                                <label for="inputNPM">NPM</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputNama" name="nama" class="form-control" placeholder="Nama" required="required" onkeypress="uppercase();" value="{{ old('nama') }}">
                                <label for="inputNama">Nama</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required="required" onkeyup="check();">
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="inputRetypePassword" name="repass" class="form-control" placeholder="Retype Password" required="required" onkeyup="check();">
                                <label for="inputRetypePassword">Retype Password</label>
                            </div>
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block"><i id="icon" class="fas fa-user-plus"></i> <span id="btnText">Sign Up</span></button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="/Login">Login</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/sbAdmin/vendor/jquery/jquery.min.js"></script>
        <script src="/sbAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="/sbAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="/sbAdmin/js/sb-admin.min.js"></script>
        <script src="/cleaveJS/cleave.min.js"></script>
        <script type="text/javascript">
            var cleave = new Cleave('.input-npm', {
                numericOnly: true,
                delimiters: ['.', '.', '.', "."],
                blocks: [2, 4, 1, 5],
                uppercase: true
            });

            var CekValidate = function() {
                var Result = true;
                var Msg = "Sign Up";

                if (Result) {
                    if (document.getElementById('inputPassword').value.length < 8) {
                        Result = false;
                        Msg = "Min length of 8 char!";
                    }
                }

                if (Result) {
                    if (document.getElementById('inputPassword').value != document.getElementById('inputRetypePassword').value) {
                        Result = false;
                        Msg = "Not Match!";
                    }
                }

                return [Result, Msg];
            };

            function check(){
                var Validate = CekValidate();
                var Res = Validate[0];
                var Msg = Validate[1];

                if (Res) {
                    $(document).ready(function(){
                        $("#btnText").html(Msg);
                        $("#submit").removeClass("btn-primary");
                        $("#submit").removeClass("btn-danger");
                        $("#submit").addClass("btn-success");
                        $("#submit").removeAttr("disabled");
                        $("#icon").removeClass("fa-user-times");
                        $("#icon").addClass("fa-user-plus");
                    });
                } else {
                    $(document).ready(function(){
                        $("#btnText").html(Msg);
                        $("#submit").removeClass("btn-primary");
                        $("#submit").addClass("btn-danger");
                        $("#submit").removeClass("btn-success");
                        $("#submit").attr("disabled", "disabled");
                        $("#icon").addClass("fa-user-times");
                        $("#icon").removeClass("fa-user-plus");
                    });
                }
            }

            function uppercase()
            {
               var text = document.getElementById('inputNama').value;
               var array1 = text.split(' ');
               var newarray1 = [];

               for(var x = 0; x < array1.length; x++){
                  newarray1.push(array1[x].charAt(0).toUpperCase()+array1[x].slice(1));
               }
               document.getElementById('inputNama').value = newarray1.join(' ');
            }
        </script>
    </body>
</html>
