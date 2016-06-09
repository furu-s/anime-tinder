<?php 

class LikeAnswer extends AppModel {

  public $belongsTo = "Option";

  public function findLikeAnswerByquestionIDAndUserID ($questionID, $userID) {
    $params = array(
      "conditions" => array(
        "LikeAnswer.question_id" => $questionID,
        "LikeAnswer.user_id" => $userID
      )
    );
    return $this->find("all", $params);

  }
}
 ?>