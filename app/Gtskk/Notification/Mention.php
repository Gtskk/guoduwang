<?php  namespace Gtskk\Notification;

use Member;

class Mention
{
    public $body_parsed;
    public $members = [];
    public $membernames;
    public $body_original;

	public function getMentionedMembername() 
	{
		preg_match_all("/(\S*)\@([^\r\n\s]*)/i", $this->body_original, $atlist_tmp);
		$membernames = [];
		foreach($atlist_tmp[2] as $k=>$v) {
			
		    if($atlist_tmp[1][$k] || strlen($v) >25) {
				continue;
			}
			$membernames[] = $v;
		}
		return array_unique($membernames);
	}

	public function replace()
	{
		$this->body_parsed = $this->body_original;

		foreach ($this->members as $member) {
			$search = '@' . $member->username;
			$place = '['.$search.']('.route('members.show', $member->id).')';
			$this->body_parsed = str_replace($search, $place, $this->body_parsed);
		}
	}

	public function parse($body) 
	{
		$this->body_original = $body;

		$this->membernames = $this->getMentionedMembername();
		count($this->membernames) > 0 && $this->members = Member::whereIn('username', $this->membernames)->get();
			
		$this->replace();
		return $this->body_parsed;
	}
}