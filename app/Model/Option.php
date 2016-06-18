<?php 

class Option extends AppModel {

  public function findOptionbyQuestionID($questionID) {
    if ($questionID == null) {
      // bad params
    }

    $params = array(
      "conditions" => array(
        "question_id" => $questionID
      )
    );

    return $this->find("all", $params);

  }

}
 ?>