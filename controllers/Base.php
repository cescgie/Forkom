<?php

namespace DPK\Controller;

class Base
{
	private static $_instance;

	private static $_folders = array(
		'controller' => 'controllers',
		'model'      => 'models',
		'view'       => 'views',
		'asset'      => 'assets',
		'admin_page' => 'views/admin-page'
	);

	private $_paths = array();

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

	public static function &app()
	{
		return self::$_instance;
	}

	public function getFolder($name)
	{
		if (isset($this->_paths[$name]))
			return $this->_paths[$name]['folder'];

		return '';
	}

	public function getPath($name)
	{
		if (isset($this->_paths[$name]))
			return $this->_paths[$name]['path'];

		return '';
	}

	public function getUrl($name)
	{
		if (isset($this->_paths[$name]))
			return $this->_paths[$name]['url'];

		return '';
	}

	public function getImage($file, $return_path = false)
	{
		return $this->getAsset('img/'.$file, $return_path);
	}

	public function getCss($file, $return_path = false)
	{
		return $this->getAsset('css/'.$file, $return_path);
	}

	public function getScript($file, $return_path = false)
	{
		return $this->getAsset('js/'.$file, $return_path);
	}

	public function getAsset($file, $return_path = false)
	{
		if ($return_path)
			return $this->_paths['asset']['path'].$file;

		return $this->_paths['asset']['url'].$file;
	}

	public function loadView($file, $data = [])
	{
		extract($data);

		include($this->getPath('view').$file);
	}
}
