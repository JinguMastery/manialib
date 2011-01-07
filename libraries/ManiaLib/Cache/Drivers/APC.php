<?php
/**
 * ManiaLib - Lightweight PHP framework for Manialinks
 * 
 * @copyright   Copyright (c) 2009-2011 NADEO (http://www.nadeo.com)
 * @license     http://www.gnu.org/licenses/lgpl.html LGPL License 3
 * @version     $Revision$:
 * @author      $Author$:
 * @date        $Date$:
 */

namespace ManiaLib\Cache\Drivers;

/**
 * APC Cache driver
 */
class APC extends \ManiaLib\Cache\Cache
{
	function exists($key)
	{
		return apc_exists($key);
	}
	
	function get($key)
	{
		return apc_fetch($key);
	}
	
	function fetch($key)
	{
		return apc_fetch($key);
	}
	
	function add($key, $value, $ttl=0)
	{
		if(!apc_add($key, $value, $ttl))
		{
			throw new \Exception('apc_add('.$key.') failed');
		}
	}
	
	function store($key, $value, $ttl=0)
	{
		if(!apc_store($key, $value, $ttl))
		{
			throw new \Exception('apc_store('.$key.') failed');
		}
	}
	
	function delete($key)
	{
		if(!apc_delete($key))
		{
			throw new \Exception('apc_delete('.$key.') failed');
		}
	}
	
	function clearCache()
	{
		if(!apc_clear_cache())
		{
			throw new \Exception('apc_clear_cache() failed');
		}
	}
	
	function inc($key)
	{
		apc_inc($key);
	}
}

?>