<?php 

class UsersController extends AppController {

  public function welcome() {

  }

  public function add() {
    $this->autoRender = false;
    $user = $this->Auth->user();
    $this->set(compact("user"));
    if ($this->request->is("post")) {
      $data = $this->request->data;
      if ($this->User->save($data)) {
      }
    }

    $this->redirect("/");
  }

  public function logout() {
    $this->Auth->logout();
    $this->redirect($this->Auth->logoutRedirect);
  }

}

 ?>