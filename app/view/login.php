<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>login!</p>
    <form class="form" action='index.php?action=login' method="get">
      <input type="hidden" name="action" value="login" />
      <label for="username">username</label><input type="text" name="username" id="username" /><br />
      <label for="password">password</label><input type="password" name="password" id="password" /><br />
      <input type="submit"/>
    </form>
    <span>not an acount yet? sign up here: <a href="index.php?action=register">here</a> </span>

  </body>
</html>
