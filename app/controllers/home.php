<?php

/**
 *
 */
class home extends Controller
{
  
  public function index($id='', $name='') {
    $this->view('home\index', [
      'name' => $name,
      'id' => $id
    ]);
    $this->view->render();
  }
}

?>
