<?php

class ApiController extends BaseController {

	public function weather()
	{
		

		$return = Cache::remember('user_weather', 30, function()
		{
		    $url = Config::get('site.weather_url');
    		$code = $this->getCode();
    		$data = file_get_contents($url.'/'.$code.'.html');
    		$return = '';
    		$weather = json_decode($data);
    		if(is_object($weather)) // 判断返回的时候是json
    		{
    			return $weather->weatherinfo->weather;
    		}
    		return '';
		});

		die(json_encode($return));

	}

	/**
	 *  获取中国天气网的代码
	 */
	private function getCode()
	{
		$citycodes = Config::get('site.citycodes');
		$city = $this->getCity('218.94.75.50');
		Log::info(Request::ip());
		Log::info($city);
		$city = rtrim($city, '市');
		$code = isset($citycodes[$city]) ? $citycodes[$city] : '';

		return $code;
	}

	/**
	 * 获取 IP  地理位置
	 * 淘宝IP接口
	 * @Return: array
	 */
	private function getCity($ip)
	{
		$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
		$ip=json_decode(file_get_contents($url));	
		if((string)$ip->code=='1'){
		   return false;
	 	}
	 	$data = $ip->data->city;
		return $data;	
	}


}
