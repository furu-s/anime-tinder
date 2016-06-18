<!-- start padding container -->
<div class="wrap">
 <!--  <h4 class="text-center">好きなアニメマッチング！</h4> -->
  <br>
  <br>
  <!-- start jtinder container -->
  <div id="tinderslide">
    <ul>
      <?php for($i = 4; $i < 24; $i++ ): ?>
      <li class="pane<?php if($i%2 == 1){echo '1';} else {echo '0';}; ?>">
        <div class="img"><img src="/img/anime/anime_<?php echo $i; ?>.jpg" width="100%"></div>
        <div><?php echo $options[$i-1]["Option"]["name"]; ?></div>
        <div class="like"></div>
        <div class="dislike"></div>
      </li>
      <?php endfor; ?>
      <!-- <li class="pane1">
        <div class="img"><img src="/img/anime/kinmoza.jpg" width="100%"></div>
        <div>金色モザイク</div>
        <div class="like"></div>
        <div class="dislike"></div>
      </li>
      <li class="pane1">
        <div class="img"><img src="/img/anime/sao.jpg" width="100%"></div>
        <div>ソードアートオンライン</div>
        <div class="like"></div>
        <div class="dislike"></div>
      </li> -->
    </ul>
  </div>
  <!-- end jtinder container -->
</div>
<!-- end padding container -->

<!-- jTinder trigger by buttons  -->
<div class="actions clearfix">
    <a href="#" class="dislike"><i></i></a>
    <a href="#" class="like"><i></i></a>
</div>

<div id="last-card" class="text-center">
<img src="/img/loading.gif" alt="">
</div>
<form method="post" id="form">
<input type="hidden" name="question_id" id="question_id" value="1">
<input type="hidden" name="like_ids" id="likeIDs" value="">
<input type="hidden" name="dislike_ids" id="dislikeIDs" value="">
</form>