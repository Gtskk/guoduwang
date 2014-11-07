<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class Member extends Eloquent implements ConfideUserInterface {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'members';

	protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	use ConfideUser;
}
