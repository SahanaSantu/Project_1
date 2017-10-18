<?php
// Page with form to upload a csv file
class home extends page {

  // Initial load of the upload page. Presents a page with option to upload file

  public function get() {
    $form ='<style>body {background-color:#D5D8DC;} h1{color:Blue;} ul{color:black;}</style>';
    $form .= '<h1 align="center" ><font color="black">PROJECT 1</font>';
    $form .= '<h2>Upload Form</h2>';
    $form .= '<form action="index.php" method="post" enctype="multipart/form-data">';
    $form .= '<input type="file" name="fileToUpload" id="fileToUpload"></br>';
    $form .='<br>';
    $form .= '<input type="submit" value="Upload CSV" name="submit">';
    $form .= '</form>';
    
    $this->html .= $form;
    
  }

  // Handles upload of file and redirects to presentation page
  public function post() {
    $fileName = $_FILES['fileToUpload']['name'];
    if($this->uploadFile($_FILES['fileToUpload']['tmp_name'], $fileName)){
      header("Location: ".$this->URL."index.php?page=table&filename=$fileName");
    } else {
      print_r('Unable to upload file');
    }
  }

  // Function to upload file to the uploads directory
  private function uploadFile($src, $file) {
    $dest = $this->UPLOAD_DIR . $file;
    return move_uploaded_file($src, $dest);
  }
}
?>