<?php 

class User extends AppModel {

  public function findUserByID ($id = null) {

    $params = array(
      "conditions" => array(
        "id" => $id
      )
    );

    return $this->find("first", $params);
  }

  public function findUserByUsername ($username = null) {

    $params = array(
      "conditions" => array(
        "username" => $username
      )
    );

    return $this->find("first", $params);
  }

  public function findAllOtherUsers($userID) {
    $params = array(
      "conditions" => array(
        "NOT" => array(
          "id" => $userID
        )
      )
    );

    return $this->find("all", $params);
  }
}
 ?>