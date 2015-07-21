<?php

namespace DPK\Controller;

include_once( dirname(__DIR__) . '/models/DPKEntity.php' );

class Base
{
	/**
	 * @var Base
	 */
	private static $_instance;

	/**
	 * @var array
	 */
	private $_paths = [];

	/**
	 * set folder of plugins
	 * @var array
	 */
	private static $_folders = array(
		'controller' => 'controllers',
		'model'      => 'models',
		'view'       => 'views',
		'asset'      => 'assets',
		'admin_page' => 'views/admin-page'
	);

	/**
	 * set folder, path and url
	 */
	public function __construct()
	{
		if (!(self::$_instance instanceof self))
		{
			self::$_instance =& $this;
		}

		foreach(self::$_folders as $key => $folder)
		{
			$this->_paths[$key] = array(
				'folder' => $folder,
				'path'   => dirname( __DIR__ ) . '/'. $folder . '/',
				'url'    => rtrim( plugins_url( $folder, dirname(__FILE__) ), '/' ) . '/'
			);
		}
	}

	/**
	 * @return Base
	 */
	public static function &app()
	{
		return self::$_instance;
	}

	/**
	 * just get folder name
	 * @param $name
	 * @return string
	 */
	public function getFolder($name)
	{
		if (isset($this->_paths[$name]))
			return $this->_paths[$name]['folder'];

		return '';
	}

	/**
	 * get full folder address
	 * @param $name
	 * @return string
	 */
	public function getPath($name)
	{
		if (isset($this->_paths[$name]))
			return $this->_paths[$name]['path'];

		return '';
	}

	/**
	 * convert folder address to URL
	 * @param $name
	 * @return string
	 */
	public function getUrl($name)
	{
		if (isset($this->_paths[$name]))
			return $this->_paths[$name]['url'];

		return '';
	}

	/**
	 * get full path of image
	 * @param $file
	 * @param bool|false $return_path
	 * @return string
	 */
	public function getImage($file, $return_path = false)
	{
		return $this->getAsset('img/'.$file, $return_path);
	}

	/**
	 * get full pth of css
	 * @param $file
	 * @param bool|false $return_path
	 * @return string
	 */
	public function getCss($file, $return_path = false)
	{
		return $this->getAsset('css/'.$file, $return_path);
	}

	/**
	 * get full path of js
	 * @param $file
	 * @param bool|false $return_path
	 * @return string
	 */
	public function getScript($file, $return_path = false)
	{
		return $this->getAsset('js/'.$file, $return_path);
	}

	/**
	 * get full path of asset folder
	 * @param $file
	 * @param bool|false $return_path
	 * @return string
	 */
	public function getAsset($file, $return_path = false)
	{
		if ($return_path)
			return $this->_paths['asset']['path'].$file;

		return $this->_paths['asset']['url'].$file;
	}

	/**
	 * get full path of view folder
	 * @param $file
	 * @param array $data
	 */
	public function loadView($file, $data = [])
	{
		extract($data);

		include($this->getPath('view').$file);
	}

	/**
	 * check user roles
	 * the allowed user is
	 * 1. pengajian_kota = username contains 'pengajian' [pengajian_###]
	 * 2. administrator = username with role administrator
	 * @param $role
	 * @return bool
	 */
	public function checkUserLogin($role){
		global $current_user;
		$isTrue = false;
		get_currentuserinfo();

		if($role == 'pengajian_kota'){
			$arr = explode('_', $current_user->user_login);
			if($arr[0] == 'pengajian'){
				$isTrue = true;
			}
		} else if($role == 'administrator'){
			if(in_array('administrator',$current_user->roles)){
				$isTrue = true;
			}
		}

		return $isTrue;
	}
}
