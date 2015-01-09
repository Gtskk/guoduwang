<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Member extends Eloquent implements ConfideUserInterface {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'members';
	protected $guarded = array();

	use PresentableTrait;
    public $presenter = 'Gtskk\Presenters\MemberPresenter';

    // Enable soft delete
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	use ConfideUser;


    public function topics()
    {
        return $this->hasMany('Topic');
    }

    public function replies()
    {
        return $this->hasMany('Reply');
    }


	public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
