#!/usr/bin/php 
<?php 
    // 上次更新时间
    $last_update_time = "2017-01-01";
    // 数据库密码
    $db_pwd ="";
    // 要执行sql 目录
    $path = "./sql";
    date_default_timezone_set("PRC");
    $path_handle = opendir($path);
    if($path_handle) {
        while($file = readdir($path_handle)) {
            $file = $path."/".$file;
            $update_time = filemtime($file);
            
            $ex = strrchr($file,".");
     
            if($update_time > strtotime($last_update_time) && $ex ==".sql"){
                $command ="/usr/local/mysql/bin/mysql -u root -p".$db_pwd." -D test < ".$file;
          
                system($command);
            }
        }
        closedir($path_handle);
    }
