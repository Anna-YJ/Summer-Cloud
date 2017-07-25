

<?php

$fileName = $_FILES['file']['name'];
$dir="uploads/".$fileName;
//$dir="/var/www/html/uploads"; //指定的路径
$sitepath = 'http://localhost/ftp/';
//遍历文件夹下所有文件
if (false != ($handle = opendir ( $dir ))) {
    echo "已上传的文件列表：<br />\n";
    $i = 0;
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && !is_dir($dir.'/'.$file)) {
            echo '<a href="download.php">'.$file. '</a>';
            echo "<br />\n";
            
        }
    }
    //关闭句柄' . $sitepath . $file . '
    closedir($handle);
}
 
?>

