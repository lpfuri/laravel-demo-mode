<?php

namespace Lpfuri\LaravelDemoMode;

class Helper
{
	public static function dbUsername()
	{
		return config('database.connections.mysql.username');
	}

	public static function dbPassword()
	{
		return config('database.connections.mysql.password');
	}

	public static function dbName()
	{
		return config('database.connections.mysql.database');
	}

	public static function folder()
	{
		return config('demo-mode.folder');
	}

	public static function backupPath($includeStorageFolder = true)
	{
		$path = config('demo-mode.folder').'/'.config('demo-mode.backup_file_name');

		return $includeStorageFolder
			? storage_path('app').'/'.$path
			: $path;
	}
}