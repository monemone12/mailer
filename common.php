<?php
// Start the session

// 공통영역
function g5_path()
{
    $result['path'] = str_replace('\\', '/', dirname(__FILE__));
    $tilde_remove = preg_replace('/^\/\~[^\/]+(.*)$/', '$1', $_SERVER['SCRIPT_NAME']);
    $document_root = str_replace($tilde_remove, '', $_SERVER['SCRIPT_FILENAME']);
    $root = str_replace($document_root, '', $result['path']);
    $port = $_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT'] : '';
    $http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on') ? 's' : '') . '://';
    $user = str_replace(str_replace($document_root, '', $_SERVER['SCRIPT_FILENAME']), '', $_SERVER['SCRIPT_NAME']);
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    if(isset($_SERVER['HTTP_HOST']) && preg_match('/:[0-9]+$/', $host))
        $host = preg_replace('/:[0-9]+$/', '', $host);
    $host = preg_replace("/[\<\>\'\"\\\'\\\"\%\=\(\)\/\^\*]/", '', $host);
    $result['url'] = $http.$host.$port.$user.$root;
    return $result;
}

$g5_path = g5_path();

// URL ENCODING
if (isset($_REQUEST['url'])) {
    $url = strip_tags(trim($_REQUEST['url']));
    $urlencode = urlencode($url);
} else {
    $url = '';
    $urlencode = urlencode($_SERVER['REQUEST_URI']);
    if (TR_URL) {
        $p = @parse_url(TR_URL);
        $urlencode = TR_URL.urldecode(preg_replace("/^".urlencode($p['path'])."/", "", $urlencode));
    }
}

foreach ($_GET as $key => $target) {
  $article = trim($target);
  $qstr .= '&amp;'. $key . '=' . @urlencode($target);
}


if (isset($_REQUEST['page'])) { // 리스트 페이지
    $page = (int)$_REQUEST['page'];
    if ($page){
      // $qstr .= '&amp;page=' . urlencode($page);
    }

} else {
    $page = '';
}
$now_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


// QUERY_STRING
// if (isset($page)) $arr_query[] = 'page='.$page;
// $qstr = implode("&amp;", $arr_query);





include_once('config.php');   // 설정 파일

include_once('lib/common.lib.php');
?>
