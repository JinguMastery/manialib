<?php
/**
 * ManiaLib - Lightweight PHP framework for Manialinks
 * 
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version     $Revision: 3188 $:
 * @author      $Author: svn $:
 * @date        $Date: 2011-03-29 12:55:38 +0200 (mar., 29 mars 2011) $:
 */

namespace ManiaLib\Application;

class Dispatcher extends \ManiaLib\Utils\Singleton
{
	const PATH_INFO_OVERRIDE_PARAM = 'ml-forcepathinfo';
	
	/**
	 * @var bool
	 */
	protected $running;
	/**
	 * @var string
	 */
	protected $pathInfo;
	/**
	 * @var string
	 */
	protected $controller;
	/**
	 * @var string
	 */
	protected $action;
	/**
	 * @var string
	 */
	protected $calledURL;
	
	function run()
	{
		if($this->running)
		{
			throw new \Exception(get_called_class().'::run() was previously called!');
		}
		$this->running = true;
		
		$request = Request::getInstance();
		if($request->exists(self::PATH_INFO_OVERRIDE_PARAM))
		{
			$this->pathInfo = $request->get(self::PATH_INFO_OVERRIDE_PARAM, '/');
			$request->delete(self::PATH_INFO_OVERRIDE_PARAM);
		}
		else
		{
			$this->pathInfo = \ManiaLib\Utils\Arrays::getNotNull($_SERVER, 'PATH_INFO', '/');
		}
		
		list($this->controller, $this->action) = Route::getActionAndControllerFromRoute($this->pathInfo);
		
		$this->calledURL = $request->createLink(Route::CUR, Route::CUR);
		
		try 
		{
			Controller::factory($this->controller)->launch($this->action);
			Response::getInstance()->render();
		}
		catch(\Exception $e )
		{
			ErrorHandling::exceptionHandler($e);
			Response::getInstance()->render();
		}
	}
	
	function getController()
	{
		return $this->controller;
	}

	function getAction($defaultAction = null)
	{
		return $this->action ? $this->action : $defaultAction;
	}
	
	function getPathInfo()
	{
		return $this->pathInfo;	
	}
	
	function getCalledURL()
	{
		return $this->calledURL;
	}
} 

?>