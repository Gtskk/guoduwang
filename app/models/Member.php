<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Zizaco\Entrust\HasRole;

class Member extends Eloquent implements ConfideUserInterface {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'members';

	use PresentableTrait;
    public $presenter = 'Gtskk\Presenters\MemberPresenter';

    // 启用 hasRole( $name ), can( $permission ),
    //   and ability($roles, $permissions, $options)等一些Entrust包的功能
    use HasRole;

    use ConfideUser;

    // 启用软删除功能
    use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'github_id');
    protected $guarded = array('id', 'notifications', 'is_banned');

    public function topics()
    {
        return $this->hasMany('Topic', 'member_id');
    }

    public function replies()
    {
        return $this->hasMany('Reply');
    }

    public function notifications()
    {
        return $this->hasMany('Notification')->recent()->with('topic', 'fromMember');
    }

    public function attentions()
    {
    	return $this->hasMany('Attention');
    }

    public function favorites()
    {
        return $this->hasMany('Favorite');
    }

    public function FavoriteTopics()
    {
        return $this->belongsToMany('Topic', 'favorites');
    }

    public function getByGithubId($githubid)
    {
        return $this->where('github_id', '=', $githubid)->first();
    }

    public function getByGhostId($ghostid)
    {
        return $this->where('ghost_id', '=', $ghostid)->first();
    }



	public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
