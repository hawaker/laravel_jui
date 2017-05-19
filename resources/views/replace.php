<?php
function traverse($func,$path = '.') {

  $current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
  while(($file = readdir($current_dir)) !== false) {    //readdir()返回打开目录句柄中的一个条目
    $sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //构建子目录路径
    if($file == '.' || $file == '..') {
      continue;
    }
    if(is_dir($sub_dir)) {    //如果是目录,进行递归
      traverse($func,$sub_dir);
    } else {    //如果是文件,直接输出
      $func($path.DIRECTORY_SEPARATOR.$file);
    }
  }
}
/*traverse(function($name){
  if(substr($name,-10)==".blade.php"){
    $filename=substr($name,2);
    $content=file_get_contents($filename);
    $find="</form>";
    $newvalue="\t{{ csrf_field() }}".PHP_EOL."</form>";
    $content=str_ireplace($find,$newvalue,$content);
    file_put_contents($filename,$content);
  }
});*/