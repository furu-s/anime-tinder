<h1><?php echo $name; ?>さんの結果</h1>
<div class="box">
  <div class="like">
    <h2>好きなアニメ一覧</h2>
    <?php if(isset($myLikeAnswers)): ?>
    <?php foreach($myLikeAnswers as $likeAnswer):?>
      <p><?php echo $likeAnswer["Option"]["name"] ?></p>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<div class="box">
  <div class="dislike">
    <h2>好きではないアニメ一覧</h2>
    <?php if(isset($myDislikeAnswers)): ?>
    <?php foreach($myDislikeAnswers as $dislikeAnswer):?>
      <p><?php echo $dislikeAnswer["Option"]["name"] ?></p>
    <?php endforeach; ?>
    <?php else: ?>
    <p>該当なしです</p>
    <?php endif ?>
  </div>
</div>

<div class="result">
  <h2>好き嫌いが完全一致した人</h2>
  <?php if(!empty($match_users)): ?>
  <?php foreach($match_users as $match_user): ?>
  <p><?php echo $match_user["User"]["username"];?></p>
  <?php endforeach; ?>
  <?php else: ?>
  <p>該当なしです</p>
  <?php endif ?>
</div>
</table>