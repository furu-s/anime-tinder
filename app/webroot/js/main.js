/**
 * jTinder initialization
 */
var like_ids = [];
var dislike_ids = [];
/**
 * jTinder initialization
 */
$("#tinderslide").jTinder({
    onDislike: function (item) {
      //$('#status').html('Dislike image ' + (item.index()+1));
      dislike_ids.push(item.index() + 1);
      console.log(like_ids);
      console.log(dislike_ids);

      if (like_ids.length + dislike_ids.length == 3) {
        $("#last-card").fadeIn();
        $("#dislikeIDs").attr("value", dislike_ids);
        $("#likeIDs").attr("value", like_ids);
        console.log("=========");
        $('#form').submit();
      }
    },
    onLike: function (item) {
      //$('#status').html('Like image ' + (item.index()+1));
      like_ids.push(item.index() + 1);
      console.log(like_ids);
      console.log(dislike_ids);
      if (like_ids.length + dislike_ids.length == 3) {
        $("#last-card").fadeIn();
        $("#dislikeIDs").attr("value", dislike_ids);
        $("#likeIds").attr("value", like_ids);
        console.log("=========");
        $('#form').submit();
        // $("#form").bind('ajax:complete', function() {
        //   alert("送信完了！")
        // });
      }
    },
  animationRevertSpeed: 200,
  animationSpeed: 400,
  threshold: 1,
  likeSelector: '.like',
  dislikeSelector: '.dislike'
});



/**
 * Set button action to trigger jTinder like & dislike.
 */
$('.actions .like, .actions .dislike').click(function(e){
  e.preventDefault();
  $("#tinderslide").jTinder($(this).attr('class'));
});