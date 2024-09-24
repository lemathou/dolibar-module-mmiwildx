<?php

require_once DOL_DOCUMENT_ROOT.'/comm/action/class/actioncomm.class.php';
require_once '../vendor/autoload.php';

class mmiwildx_sync
{
	protected static $api_host;
	protected static $api_app_id;
	protected static $api_app_name;
	protected static $api_secret_key;
	
	protected static $client;

	public static function __init()
	{
		static::$api_host = getDolGlobalString('MMI_WILDX_HOST');
		static::$api_app_id = getDolGlobalString('MMI_WILDX_APP_ID');
		static::$api_app_name = getDolGlobalString('MMI_WILDX_APP_NAME');
		static::$api_secret_key = getDolGlobalString('MMI_WILDX_SECRET_KEY');
	}

	public static function client()
	{
		static::$client = new Wildix\Integrations\Client($config, []);
	}

	public static function api_query($url, $action='GET', $params=[])
	{
		$config = [
			'host' => static::$api_host,
			'app_id' => static::$api_app_id,
			'secret_key' => static::$api_app_name,
			'app_name' => static::$api_secret_key,
		];
		
		$url_params = [];
		foreach($params as $n=>$v)
			$url_params[] = $n.'='.$v;
		$cmd = 'curl -v -H "Content-Type: application/json" -X '.$action.' -H "X-Redmine-API-Key: '.static::$api_token.'" '.static::$api_url.'/'.$url.'.json'.(!empty($url_params) ?'?'.implode('&', $url_params) :'');
		echo $cmd;
		$a = exec($cmd, $res);
		$data = json_decode($res[0]);
		return $data;
	}

	// Sync

	public static function sync($yearmonth=NULL)
	{
		global $db, $user;
	}

}

mmiwildx_sync::__init();
