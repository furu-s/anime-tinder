<?php 

class DislikeAnswer extends AppModel {

  public $belongsTo = "Option";

  public function findDislikeAnswerByquestionIDAndUserID ($questionID, $userID) {
    $params = array(
      "conditions" => array(
        "DislikeAnswer.question_id" => $questionID,
        "DislikeAnswer.user_id" => $userID
      )
    );
    return $this->find("all", $params);

  }
}
 ?>