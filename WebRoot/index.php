<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

//define('BUILD_LITE_FILE',true);

// 绑定访问Home模块
define('BIND_MODULE','Home');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define('UPLOAD','Public/Uploads/');//定义上传文件地址常量
define('APP_PATH',"../Application/");
require_once '../ThinkPHP/ThinkPHP.php';
