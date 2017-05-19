<?php
function traverse($func,$path = '.') {

  $current_dir = opendir($path);    //opendir()����һ��Ŀ¼���,ʧ�ܷ���false
  while(($file = readdir($current_dir)) !== false) {    //readdir()���ش�Ŀ¼����е�һ����Ŀ
    $sub_dir = $path . DIRECTORY_SEPARATOR . $file;    //������Ŀ¼·��
    if($file == '.' || $file == '..') {
      continue;
    }
    if(is_dir($sub_dir)) {    //�����Ŀ¼,���еݹ�
      traverse($func,$sub_dir);
    } else {    //������ļ�,ֱ�����
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