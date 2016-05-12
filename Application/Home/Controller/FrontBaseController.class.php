<?php

namespace Home\Controller;

use Think\Controller;

class FronBaseController extends Controller{

   function __construct() {
       parent::__construct();
       echo "前端基累函数";
   }
}
