<?php

namespace Home\Controller;

use Think\Controller;

class FrontBaseController extends Controller{

   function __construct() {
       parent::__construct();
       $this->title="小潜潜商城";
       if(isMobile()){//分配手机模板
           C('DEFAULT_V_LAYER','View/Mobile');
       }
       $this->version=1231;
       $this->setWebSetting();
   }
   
   /**
    * @name设置网站的信息
    */
   function setWebSetting(){
       $settingModel=M("setting");
       $settings=$settingModel->cache('settings',20000)->select();
//       
      $tempSetting=array();
       foreach($settings as $val){
          $tempSetting[$val['key']] = $val;
       }
      $this->assign("setting", $tempSetting);
       
   }
//   
   
}
