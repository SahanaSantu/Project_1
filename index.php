<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj = new main();

// Entry point to the application, handles all valid requests
class main {
  public function __construct(){
    $pageRequest = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';
    $page = new $pageRequest;
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
      $page->get();
    }else {
      $page->post();
    }
  }
}
?>