<?php
function fileupload($file, $title, $path){
  global $file_name;
  global $file_org_name;
  $file_org_name = $file['name'];
  $file_type = $file['type'];
  if($file_type == "application/x-zip-compressed"){
    $file_type = 'zip';
  }
  $file_tmp = $file['tmp_name'];
  $file_name = $title . time() . "." . basename($file_type);
  $target = $path . $file_name;
  if(!move_uploaded_file($file_tmp, $target)){
   alert('파일업로드에러');
  }
  @unlink($file_tmp);
}


function mb_str_shuffle($str){
   $ret = array();
   for ($i=0; $i<mb_strlen($str, "utf-8"); $i++){
      array_push($ret, mb_substr($str, $i, 1, "utf-8"));
   }
   shuffle($ret);
   return join($ret);
}
?>
