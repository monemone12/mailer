<?php


/********************
    상수 선언
********************/
date_default_timezone_set('Asia/Seoul');
// 이 상수가 정의되지 않으면 각각의 개별 페이지는 별도로 실행될 수 없음
/********************
    경로 상수
********************/

if (isset($g5_path['path'])) {
    define('G5_PATH', $g5_path['path']);
} else {
    define('G5_PATH', '');
}

if($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "localhost:8080" ){
  define('G5_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/trabaho');
}
else{
  define('G5_URL', 'http://' . $_SERVER['HTTP_HOST'] . '');
}
define('GENERAL_UPLOAD_URL', G5_URL .'/data/');

define('GENERAL_UPLOAD_PATH', G5_PATH.'/data/');

?>
