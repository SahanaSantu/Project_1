<?php
// Page to display file contents
class table extends page {
  public function get() {
    $fileName = $_REQUEST['filename'];
    $file = fopen($this->UPLOAD_DIR . $fileName, 'r');
    $table = $this->draw($file);
    fclose($file);
    $this->html .= $table;
  }

  // Function to draw table
 
  private function draw($file) {
  
    $table.='<html>';
    $table.='<head>';
    $table.='<link rel="stylesheet" href="style.css">';
    $table.='</head>';
    $table.='<body>';
    $table.='<div class="container" id="container">';
    $table.= '<table class="gridtable" id="tableMain">';
    $table.='<tbody>';
    $header=True;
    while(($csv = fgetcsv($file, 1000, ",")) !== FALSE){
      $table .= '<tr>';
      if($header)
      {
            $table.='<thead>'; 
            $table.='<tr class="tableheader">';
            foreach ($csv as $key) {
                $table.='<th>'.$key.'</th>';
            }
            $table.='</tr>';
            $table.= '</thead>';
        $header=FALSE;    
      }
      else
      {
        foreach ($csv as $key) {
            
            $table .= '<td>'.$key.'</td>';
            
        }
      }

    }
    $table.='</tbody>';
    $table.='</table>';
    $table.='</div>';
    $table.='</body>';
    $table.='</html>';
    return $table;
  }
}
?>