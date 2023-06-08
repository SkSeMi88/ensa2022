<?php

return [
/*
	'db' => [
		'host'		=> 'localhost',
		'dbname'		=> 'ensa',
		'user'		=> 'root',
		'password'	=> 'root',
	],
*/
	// 'db' => [
	// 	'host'		=> 'localhost',
	// 	'dbname'	=> 'cq28624_ensa',
	// 	'user'		=> 'cq28624_ensa',
	// 	'password'	=> 'Ensa2021',
	// ],

	'db' => [
		'host'		=> 'localhost',
		'dbname'	=> 'cq28624_ensa',
		'user'		=> 'root',
		'password'	=> 'root',
	],

	"core_sevices"	=> [
		"admin_panel"	=> 1,
		"users_panel"	=> 1,
	],

    // "root"	=> '',
	"root"	=> '$2y$11$487e0d4e1036017417106uiUACDdHrOAZpXwmUa1W/U2R73fhdiha',

	"users_routes"	=>[
		
		'~^users/register$~'            => [\Admin\Controllers\UsersController::class, 'signUp'],
		'~^users/(\d+)/activate/(.+)$~' => [\Admin\Controllers\UsersController::class, 'activate'],
		'~^users/login$~'               => [\Admin\Controllers\UsersController::class, 'login'],
		
		'~^users/logout/$~'             => [\Admin\Controllers\UsersController::class, 'logout'],
	
		// '~^users/profile/(\d+)$~'    => [\Admin\Controllers\UsersController::class, 'profile'],
		'~^users/profile/(.+)$~'		=> [\Admin\Controllers\UsersController::class, 'profile'],
	],

	"admin_routes"	=> [

		'~^admin$~'					=> [\Admin\Controllers\AdminController::class, 'index'],
		'~^admin/users[\/]$~'		=> [\Admin\Controllers\AdminController::class, 'UsersList'],
		'~^admin/users/(\d+)$~'		=> [\Admin\Controllers\AdminController::class, 'UserCard'],
		'~^admin/roles/$~'			=> [\Admin\Controllers\AdminController::class, 'RolesList'],
		'~^admin/roles/(\d+)$~'		=> [\Admin\Controllers\AdminController::class, 'RoleCard'],
		'~^admin/urls/$~'			=> [\Admin\Controllers\AdminController::class, 'Urls'],

		'~^users/register$~' 		=> [\Admin\Controllers\UsersController::class, 'signUp'],
		'~^users/profile/(\d+)$~' 	=> [\Admin\Controllers\UsersController::class, 'profile'],
		'~^users/profile/$~' 		=> [\Admin\Controllers\UsersController::class, 'profile']

	],

	"ACL_control"	=> 1,
	"Logs_control"	=> 1,

];