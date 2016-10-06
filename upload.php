<?php
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
include("uploadclass.php");                 # 加入类文件
$f_upload = new upload_file;             # 创建对象
$f_upload->set_file_type($_FILES['src']['type']);   # 获得文件类型
$f_upload->set_file_name($_FILES['src']['name']);   # 获得文件名称
$f_upload->set_file_size($_FILES['src']['size']);   # 获得文件尺寸
$f_upload->set_upfile($_FILES['src']['tmp_name']);  # 服务端储存的临时文件名
$f_upload->set_size(1000000);               # 设置最大上传KB数
$f_upload->set_base_directory("data/uploadfile/".$_USER->id);    # 文件存储根目录名称
$f_upload->set_url("uploadadd.php");             # 文件上传成功后跳转的文件
$f_upload->save();                  # 保存文件

 ?>

