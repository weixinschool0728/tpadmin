<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends FrontBaseController {

    public function index() {
        $userModel = M("pintuan_order");
        $users=S("users");
        if(!$users){
            $users=$userModel->cache("users",60)->select();
        }
//        dump($users);
//        
//        $image = new \Think\Image();
//        $image->open('./qiguai.jpg');
//        $image->thumb(200, 200,\Think\Image::IMAGE_THUMB_CENTER)->save('./ceshi.jpg');
//        $this->display();
    }

}
