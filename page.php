<?php
// Base page extended by other pages of the application

abstract class page {
  protected $html;
  protected $UPLOAD_DIR = 'uploads/';
  protected $URL = 'https://web.njit.edu/~su83/Project_Upload/';
  public function __construct()
    {
      $this->html .= '<html>';
      $this->html .= '<body>';
    }
    public function __destruct()
    {
      $this->html .= '</body></html>';
      print_r($this->html);
    }
    public function get() {
      print_r('Generic Get Request, no mapping available');
    }
    public function post() {
      print_r($_POST);
    }
}
?>
