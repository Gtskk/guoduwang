<?php

use Zizaco\Entrust\EntrustRole;
class FrontRole extends EntrustRole 
{

	protected $table = 'front_roles';

	/**
	 * Ardent validation rules
	 *
	 * @var array
	 */
	public static $rules = array(
	  'name' => 'required|between:2,128'
	);
}