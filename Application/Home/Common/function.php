<?php 
function getCarInfoByCarTypeID($id)
{
	return D('CarInfoView')->where('car_type.id='.$id)->find();
}

function getOilInfo($id)
{
	return M('car_oil')->find($id);
}

function totalPrice($data)
{
	return $data['total']+F('service_price')-$data['card_price'];
}

function jsonToHtml($json)
{
	$array = objectToArray(json_decode($json));
	$temp = array();

	if(array_key_exists('car_oil', $array)){
		$oil = getOilInfo($array['car_oil']);
		echo "<tr><td>机油</td><td>{$oil['title']} {$oil['price']}元</td></tr>";
	}
	if(array_key_exists('jilv', $array)){
		echo "<tr><td>机油滤清器</td><td>{$array['jilv']}元</td></tr>";
	}
	if(array_key_exists('qilv', $array)){
		echo "<tr><td>空气滤清器</td><td>{$array['qilv']}元</td></tr>";
	}
	if(array_key_exists('konglv', $array)){
		echo "<tr><td>空调滤清器</td><td>{$array['konglv']}元</td></tr>";
	}
	if(array_key_exists('front_pian', $array)){
		echo "<tr><td>前刹车片</td><td>{$array['front_pian']}元</td></tr>";
	}
	if(array_key_exists('back_pian', $array)){
		echo "<tr><td>后刹车片</td><td>{$array['back_pian']}元</td></tr>";
	}
	if(array_key_exists('front_pan', $array)){
		echo "<tr><td>前刹车盘</td><td>{$array['front_pan']}元</td></tr>";
	}
	if(array_key_exists('back_pan', $array)){
		echo "<tr><td>后刹车盘</td><td>{$array['back_pan']}元</td></tr>";
	}
	if(array_key_exists('huohuasai', $array)){
		echo "<tr><td>火花塞</td><td>{$array['huohuasai']}元</td></tr>";
	}
	if(array_key_exists('shacheyou', $array)){
		echo "<tr><td>刹车油</td><td>{$array['shacheyou']}元</td></tr>";
	}
	if(array_key_exists('neishi', $array)){
		echo "<tr><td>内饰清洗</td><td>{$array['neishi']}元</td></tr>";
	}
	if(array_key_exists('kt', $array)){
		echo "<tr><td>空调清洗</td><td>{$array['kt']}元</td></tr>";
	}
	if(array_key_exists('jicang', $array)){
		echo "<tr><td>发动机舱清洗</td><td>{$array['jicang']}元</td></tr>";
	}
	if(array_key_exists('lungu', $array)){
		echo "<tr><td>轮毂清洗</td><td>{$array['lungu']}元</td></tr>";
	}
}

/**
 * 对象转数组
 * @param  [type] $obj [description]
 * @return [type]      [description]
 */
function objectToArray($obj){
    $arr = is_object($obj) ? get_object_vars($obj) : $obj;
    if(is_array($arr)){
        return array_map(__FUNCTION__, $arr);
    }else{
        return $arr;
    }
}

function isMobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 判断手机发送的客户端标志,兼容性有待提高
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}

?>