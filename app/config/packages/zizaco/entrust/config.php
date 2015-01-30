<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Entrust Role Model
	|--------------------------------------------------------------------------
	|
	| This is the Role model used by Entrust to create correct relations.  Update
	| the role if it is in a different namespace.
	|
	*/
	'role' => '\FrontRole',

	/*
	|--------------------------------------------------------------------------
	| Entrust Roles Table
	|--------------------------------------------------------------------------
	|
	| This is the Roles table used by Entrust to save roles to the database.
	|
	*/
	'roles_table' => 'front_roles',

	/*
	|--------------------------------------------------------------------------
	| Entrust Roles foreign key
	|--------------------------------------------------------------------------
	|
	*/
	'role_local_column' => 'role_id',

	/*
	|--------------------------------------------------------------------------
	| Entrust Members foreign key
	|--------------------------------------------------------------------------
	|
	*/
	'member_local_column' => 'member_id',

	/*
	|--------------------------------------------------------------------------
	| Entrust Permission Model
	|--------------------------------------------------------------------------
	|
	| This is the Permission model used by Entrust to create correct relations.  Update
	| the permission if it is in a different namespace.
	|
	*/
	'permission' => '\FrontPermission',

	/*
	|--------------------------------------------------------------------------
	| Entrust Permissions Table
	|--------------------------------------------------------------------------
	|
	| This is the Permissions table used by Entrust to save permissions to the database.
	|
	*/
	'permissions_table' => 'front_permissions',

	/*
	|--------------------------------------------------------------------------
	| Entrust Permissions foreign key
	|--------------------------------------------------------------------------
	|
	*/
	'permission_local_column' => 'permission_id',

	/*
	|--------------------------------------------------------------------------
	| Entrust permission_role Table
	|--------------------------------------------------------------------------
	|
	| This is the permission_role table used by Entrust to save relationship between permissions and roles to the database.
	|
	*/
	'permission_role_table' => 'front_permission_role',

	/*
	|--------------------------------------------------------------------------
	| Entrust assigned_roles Table
	|--------------------------------------------------------------------------
	|
	| This is the assigned_roles table used by Entrust to save assigned roles to the database.
	|
	*/
	'assigned_roles_table' => 'front_assigned_roles',
);
