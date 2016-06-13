<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array("User", "LikeAnswers", "DislikeAnswers");

  public function beforeFilter() {
    $this->Auth->allow("*");
  }

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function home() {
    $user = $this->Auth->user();

    // 初回か、答えてから24時以上経過していれば回答できる
    if ($user["User"]["last_answered"] == null || time() - strtotime($user["User"]["last_answered"]) > (3600 * 24)) {
      if ($this->request->is("post")) {
        $data = $this->request->data;

        if ($data["like_ids"] != "") {
          $like_ids = explode(",", $data["like_ids"]);
          for($i = 0; $i < count($like_ids); $i++) {
            $this->LikeAnswers->create();  
            $this->LikeAnswers->saveField("question_id", $data["question_id"]);
            $this->LikeAnswers->saveField("option_id", $like_ids[$i]);
            $this->LikeAnswers->saveField("user_id", $user["User"]["id"]);
          }
        }
      
        if ($data["dislike_ids"] != "") {
          $dislike_ids = explode(",", $data["dislike_ids"]);
          for($i = 0; $i < count($dislike_ids); $i++) {
            $this->DislikeAnswers->create();  
            $this->DislikeAnswers->saveField("question_id", $data["question_id"]);
            $this->DislikeAnswers->saveField("option_id", $dislike_ids[$i]);
            $this->DislikeAnswers->saveField("user_id", $user["User"]["id"]);
          }
        }

        $this->User->id = $user["User"]["id"];
        $this->User->saveField("last_answered", date("Y-m-d H:i:s"));
        $this->redirect("/result");
      }
    } else {
      //$this->Session->setFlash("回答してから24時間は回答できませんよ！");

      // ローカルではリダイレクトしない
      if ($_SERVER["HTTP_HOST"] != "local.anitme-tinder.com") {
        $this->redirect("/result");  
      }
    }

    // 最終更新日をupdate
    $user = $this->User->findUserByID($user["User"]["id"]);
    // $this->Session->write('Auth', $user["User"]);

	}
}
