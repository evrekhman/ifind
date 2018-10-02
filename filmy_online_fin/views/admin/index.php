<?php include ROOT.'/views/layouts/header.php';?>
<div class="container">
<div class="row">
    <div class="col-md-12">
  <? if(empty($_SESSION['admin'])): ?>
          <form class="form-horizontal" style="width:50%;margin:0 auto;margin-top:10%;margin-bottom:10%;" method="POST" role="form">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Запомнить меня
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Войти</button>
                </div>
              </div>
            </form>

    <? else: ?>

        <div class="jumbotron">
          <h1>Привет, <?=$_SESSION['admin']?>!</h1>
          <p>...</p>
          <p><a href="/zzz/parse" class="btn btn-primary btn-lg" role="button">Перейти в Кабинет</a></p>
          <p><a href="/zzz/kp" class="btn btn-primary btn-lg" role="button">Парсер Кионопоиск</a></p>
        </div>

    <? endif; ?>
    </div>
</div>
</div>
<?php include ROOT.'/views/layouts/footer.php';?>