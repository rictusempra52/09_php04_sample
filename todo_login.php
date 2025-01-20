<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todoリストログイン画面</title>
</head>

<body>
    <fieldset>
      <legend>todoリストログイン画面</legend>
      <form action="todo_login_act.php" method="POST">
        <div>
          username: <input type="text" name="username">
        </div>
        <div>
          password: <input type="password" name="password">
        </div>
        <div>
          <input type="submit" value="login">
        </div>
      </form>
      <a href="todo_register.php">or register</a>
    </fieldset>
</body>

</html>
