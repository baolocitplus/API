<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <h2 class="text-center">LOGIN</h2>
    <div class="col-md-6 col-md-offset-3" id="result">     
    </div>
    <form action="" method="POST" id="">
<!--       {{ csrf_field() }} -->
      <div class="row" >
        <div class="col-md-6 col-md-offset-3">
          <label>Email</label>
          <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" required>
        </div>
      </div>
      <div class="row" style="margin-top:20px;">
        <div class="col-md-6 col-md-offset-3">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required>
        </div>
      </div>
      
    </form>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-6 col-md-offset-3">
          <button id="loginForm" class="btn btn-success btn-block">Login</button>
        </div>
      </div>
  </div>

  <script language="javascript">
 $("#loginForm").on('click',function(){
  var a = $('#email').val();
  var b = $('#password').val();
  // console.log("a = "+a+"-------b="+b);
  // return false;
    $.ajax({
        type: "POST",
        url: "http://localhost:8000/api/auth/login",
        data:{
            'email' : a,
            'password': b
        },
        success: function(result)
        {
          // console.log(result.status);
            if(result.status=='ok') // you should do your checking here
            {
                
                 // setcookie('token1',result.token, time() + (86400), "/");


                 window.location = 'list'; //just to show that it went through
                 localStorage.setItem('token',result.token);
                
            }
            else
            {
                $('#result').empty().addClass('error')
                    .append('Login That Bai!');
            }
            // alert('aaaa');
        }
    });
});
  </script>
</body>
</html>
