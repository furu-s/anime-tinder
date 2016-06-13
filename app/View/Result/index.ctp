<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h1 class="result-main-title"><?php echo $auth_user["User"]["account"]; ?>さんの結果</h1>
    <?php if (time() - strtotime($auth_user["User"]["last_answered"]) < (3600 * 24)): ?>
    <p class="bg-danger message">回答してから24時間は回答を更新できません！<br>
    <?php echo $auth_user["User"]["last_answered"]; ?>に回答しました！
    </p>
    <?php endif; ?>
    </div>
    <div class="col-md-12">
      <div class="box">
        <div class="like">
          <h2 class="result-title">好きなアニメ一覧</h2>
          <?php if(!empty($myLikeAnswers)): ?>
          <?php foreach($myLikeAnswers as $likeAnswer):?>
            <p><?php echo $likeAnswer["Option"]["name"] ?></p>
          <?php endforeach; ?>
          <?php else: ?>
          <p>該当なしです。</p>
          <?php endif ?>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="box">
        <div class="dislike">
          <h2 class="result-title">好きではないアニメ一覧</h2>
          <?php if(!empty($myDislikeAnswers)): ?>
          <?php foreach($myDislikeAnswers as $dislikeAnswer):?>
            <p><?php echo $dislikeAnswer["Option"]["name"] ?></p>
          <?php endforeach; ?>
          <?php else: ?>
          <p>該当なしです。</p>
          <?php endif ?>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="result box">
        <h2 class="result-title">好き嫌いが完全一致した人</h2>
        <?php if(!empty($match_users)): ?>
        <?php foreach($match_users as $match_user): ?>
        <p><a href="https://twitter.com/<?php echo $match_user["User"]["account"];?>" target="_blank"><img src='<?php echo $match_user["User"]["image"];?>' class="img-circle"><?php echo $match_user["User"]["account"];?></a></p>
        <?php endforeach; ?>
        <?php else: ?>
        <p>該当なしです</p>
        <?php endif ?>
      </div>
    </div>

    <div class="col-md-12">
    <a href="/users/logout">ログアウト</a>
    </div>
  </div>
</div>