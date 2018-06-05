<?php
      if(is_uploaded_file($_FILES['file']['tmp_name'])) {

          function file_upload($file, $folder, $allowExt, $file_name) {
                $ext = substr(strrchr($file['name'], '.'), 1);
  
                if($ext) {
                     $allow = explode(',', $allowExt);
  
                     if(is_array($allow)) {
                          $check = in_array($ext, $allow);
                     } else {
                          $check = ($ext == $allow) ? true : false;
                     }
                }
  
                $upload_file =  $folder.$file_name;
  
                if(@move_uploaded_file($file['tmp_name'], $upload_file)) {
                     @chmod($upload_file, 0707);
                        $return = ' type="text/javascript">function copy(str) { clipboardData.setData("Text", str); "°æ·Î°¡ º¹»ç µÊ"); }
                        </script>';
                        $return.= '¾÷·Îµå µÈ ÆÄÀÏ °æ·Î : . <a href="'.$upload_file.'">'.$upload_file.'</a> ';
                        return $return;

                                    } else {
                                          exit(' type="text/javascript">\'¾÷·Îµå¿¡ ½ÇÆÐÇÏ¿´½À´Ï´Ù!\'); history.go(-1);</script>');
                                    }
                              }
                        

                              $upload_return = file_upload($_FILES['file'], 'upload/', 'jpg,gif,png,jpeg,JPG,GIF,PNG,JPEG', $_FILES['file']['name']);
  
           echo $upload_return;
  
      } else {
 ?>

 <script>
       alert(window.location.href);
       </script>
 <form action="index.php" method="post" enctype="multipart/form-data">
      <input type="file" name="file" /><br />
      <input type="submit" value="Upload" />
 </form>
 <?php
      }
 ?>
