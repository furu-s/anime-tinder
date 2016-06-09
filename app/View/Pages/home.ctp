<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jTinder Touch Slider</title>
    <link rel="stylesheet" type="text/css" href="css/jTinder.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
    .wrap {
      position: relative;
    }

    #post-form {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      display: none;
    }
    </style>
</head>
<body>
    <!-- start padding container -->
    <div class="wrap">
      <!-- start jtinder container -->
      <div id="tinderslide">
        <ul>
          <li class="pane1">
            <div class="img"><img src="img/anime/kaminomi.jpg" width="100%"></div>
            <div>神のみぞ知る世界</div>
            <div class="like"></div>
            <div class="dislike"></div>
          </li>
          <li class="pane2">
            <div class="img"><img src="img/anime/kinmoza.jpg" width="100%"></div>
            <div>金色モザイク</div>
            <div class="like"></div>
            <div class="dislike"></div>
          </li>
          <li class="pane3">
            <div class="img"><img src="img/anime/sao.jpg" width="100%"></div>
            <div>ソードアートオンライン</div>
            <div class="like"></div>
            <div class="dislike"></div>
          </li>
        </ul>
      </div>
      <!-- end jtinder container -->
    </div>
    <!-- end padding container -->

    <!-- jTinder trigger by buttons  -->
    <div class="actions">
        <a href="#" class="dislike"><i></i></a>
        <a href="#" class="like"><i></i></a>
    </div>

    <div id="post-form" class="text-center">
      <form action="" method="post" id="form">
        <h2>結果を登録しよう！</h2>
        <p>名前：<input type="text" name="username" id="inputName"></p>
        <input type="hidden" name="question_id" id="question_id" value="1">
        <input type="hidden" name="like_ids" id="likeIds" value="">
        <input type="hidden" name="dislike_ids" id="dislikeIds" value="">
        <button class="btn btn-primary" id="submitBtn">確定する</button>
        <br>
        <br>
        <p>一度確定した結果は1週間変更できません！</p>
      </form>
    </div>

    <!-- jTinder status text  -->
    <div id="status"></div>

    <!-- jQuery lib -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- transform2d lib -->
    <script type="text/javascript" src="js/jquery.transform2d.js"></script>
    <!-- jTinder lib -->
    <script type="text/javascript" src="js/jquery.jTinder.js"></script>
    <!-- jTinder initialization script -->
    <script type="text/javascript" src="js/main.js"></script>

    <script type="text/javascript">
      $("#submitBtn").on("click", function(){
        $(this).css("pointer-events", "none");
        $("#dislikeIds").attr("value", dislike_ids);
        $("#likeIds").attr("value", like_ids);
        $('#form').submit();
      })
    </script>
</body>
</html>