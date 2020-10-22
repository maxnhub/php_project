<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="wrapper fadeInDown">
      <div id="formContent">
              <!-- Tabs Titles -->

              <!-- Icon -->
              <div class="fadeIn first">
                  <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
              </div>

              <!-- Login Form -->
              <form action="form.php" method="post">
                  <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
                  <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                  <input type="submit" class="fadeIn fourth" value="Log In">
              </form>

              <!-- Remind Passowrd -->
              <div id="formFooter">
                  <a class="underlineHover" href="#">Forgot Password?</a>
              </div>

          </div>
      </div>
  </body>
</html>