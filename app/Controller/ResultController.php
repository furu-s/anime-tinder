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
class ResultController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
  public $uses = array("User", "LikeAnswer", "DislikeAnswer");

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *  or MissingViewException in debug mode.
 */
  public function index() {
    $name = $this->request->query['name'];
    $user = $this->User->findUserByUsername($name);

    $questionID = 1;


    $myLikeAnswers    = $this->LikeAnswer->findLikeAnswerByquestionIDAndUserID($questionID, $user["User"]["id"]);
    $myDislikeAnswers = $this->DislikeAnswer->findDislikeAnswerByquestionIDAndUserID($questionID, $user["User"]["id"]);

    debug($myLikeAnswers);
    debug($myDislikeAnswers);


    // IDだけ取り出す
    $myLikeAnswerIDs = array();
    foreach($myLikeAnswers as $myLikeAnswer) {
      array_push($myLikeAnswerIDs, $myLikeAnswer["Option"]["id"]);
    }

    $myDislikeAnswerIDs = array();
    foreach($myDislikeAnswers as $myDislikeAnswer) {
      array_push($myDislikeAnswerIDs, $myDislikeAnswer["Option"]["id"]);
    }

    // マッチしたユーザーのID用の配列
    $match_user_ids = array();

    // マッチしたユーザー情報を用の配列
    $match_users = array();

    // すべてのユーザーのIDを取得する
    $users = $this->User->findAllOtherUsers($user["User"]["id"]);
    foreach($users as $user) {
      $otherUserID = $user["User"]["id"];
      $otherLikeAnswers[$otherUserID]    = $this->LikeAnswer->findLikeAnswerByquestionIDAndUserID($questionID, $otherUserID);
      $otherDislikeAnswers[$otherUserID] = $this->DislikeAnswer->finddisLikeAnswerByquestionIDAndUserID($questionID, $otherUserID);


      // IDだけ取り出す
      $otherLikeAnswerIDs[$otherUserID] = array();
      foreach($otherLikeAnswers[$otherUserID] as $otherLikeAnswer) {
        array_push($otherLikeAnswerIDs[$otherUserID], $otherLikeAnswer["Option"]["id"]);
      }

      $otherDislikeAnswerIDs[$otherUserID] = array();
      foreach($otherDislikeAnswers[$otherUserID] as $otherDislikeAnswer) {
        array_push($otherDislikeAnswerIDs[$otherUserID], $otherDislikeAnswer["Option"]["id"]);
      }

      // 差分をとる
      $like_diff = array_diff($myLikeAnswerIDs, $otherLikeAnswerIDs[$otherUserID]);
      $dislike_diff = array_diff($myDislikeAnswerIDs, $otherDislikeAnswerIDs[$otherUserID]);
    
      if (empty($like_diff) && empty($dislike_diff)) {
        array_push($match_user_ids, $user["User"]["id"]);
      }
    }

    foreach($match_user_ids as $math_user_ids) {
      array_push($match_users, $this->User->findUserByID($math_user_ids));
    }

    $this->set(compact("name", "myLikeAnswers", "myDislikeAnswers", "match_users"));;
  }
}
