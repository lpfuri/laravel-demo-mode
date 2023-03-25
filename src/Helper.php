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

	public static function restoringPeriod()
	{
		return config('demo-mode.restoring_period');
	}

	public static function userId()
	{
		return config('demo-mode.demo_user_id');
	}

	public static function userUpdatingEvent()
	{
		return config('demo-mode.user_updating_event');
	}

	public static function userDeletingEvent()
	{
		return config('demo-mode.user_deleting_event');
	}

	public static function errorCode()
	{
		return config('demo-mode.error_code');
	}
}