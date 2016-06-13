<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アニメマッチング</title>
    <link rel="stylesheet" type="text/css" href="css/jTinder.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
    body {
      font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", メイリオ, Meiryo, "ＭＳ Ｐゴシック", sans-serif;
      -webkit-font-smoothing: antialiased;
    }

    .wrap {
      position: relative;
    }

    #last-card {
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      display: none;
    }

    .message {
      padding: 20px 10px;
    }

    .img-circle {
      border-radius: 50%;
      border: #ddd thin solid;
      margin: 0 16px 0 0;
    }

    .result-main-title {
      font-size: 28px;
      margin:12px 0 20px;
    }

    .result-title {
      font-size: 20px;
      font-weight: bold;
      padding: 0 0 0 12px;
      margin:0 0 8px 0;
      border-left:#16a085 5px solid;
    }

    .box {
      margin: 0 0 24px 0;
      padding: 10px;
      background-color:#f0f0f0;
    }

    </style>
</head>
<body>
<?php echo $this->Flash->render(); ?>
<?php echo $this->fetch('content'); ?>
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
    // $("#dislikeIds").attr("value", dislike_ids);
    // $("#likeIds").attr("value", like_ids);
    // $('#form').submit();
  })
</script>
</body>
</html>
