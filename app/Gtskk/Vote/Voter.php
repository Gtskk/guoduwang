<?php namespace Gtskk\Vote;

use Reply, Confide, Topic, Vote, Notification; 

class Voter
{
	public $notifiedMembers = [];

	public function topicUpVote(Topic $topic)
	{
		if($topic->votes()->ByWhom(Confide::user()->id)->WithType('upvote')->count())
		{
			// 点击两次清除顶状态
			$topic->votes()->ByWhom(Confide::user()->id)->WithType('upvote')->delete();
			$topic->decrement('vote_count', 1);
		}
		elseif($topic->votes()->ByWhom(Confide::user()->id)->WithType('downvote')->count())
		{
			$topic->votes()->ByWhom(Confide::user()->id)->WithType('downvote')->delete();
			$topic->votes()->create(['user_id' => Confide::user()->id, 'is' => 'upvote']);
			$topic->increment('vote_count', 2);
		}
		else
		{
			// 点击一次更新顶状态
			$topic->votes()->create(['user_id' => Confide::user()->id, 'is' => 'upvote']);
			$topic->increment('vote_count', 1);

			Notification::notify('topic_upvote', Confide::user(), $topic->member, $topic);
		}
	}


	public function topicDownVote(Topic $topic)
	{
		if ($topic->votes()->ByWhom(Confide::user()->id)->WithType('downvote')->count()) {
            // 点击两次清除踩状态
            $topic->votes()->ByWhom(Confide::user()->id)->WithType('downvote')->delete();
            $topic->increment('vote_count', 1);
        } 
        elseif ($topic->votes()->ByWhom(Confide::user()->id)->WithType('upvote')->count()) 
        {
            // 用户已经点击了顶状态
            $topic->votes()->ByWhom(Confide::user()->id)->WithType('upvote')->delete();
            $topic->votes()->create(['user_id' => Confide::user()->id, 'is' => 'downvote']);
            $topic->decrement('vote_count', 2);
        } 
        else 
        {
            // 点击一次添加踩状态
            $topic->votes()->create(['user_id' => Confide::user()->id, 'is' => 'downvote']);
            $topic->decrement('vote_count', 1);
        }
	}


	public function replyUpVote(Reply $reply)
	{
		if(Confide::user()->id == $reply->user_id)
		{
			return \Flash::warning(lang('Can not vote your feedback'));
		}

		if($reply->votes()->ByWhom(Confide::user()->id)->WithType('upvote')->count())
		{
			// click twice for remove upvote
            $reply->votes()->ByWhom(Auth::user()->id)->WithType('upvote')->delete();
            $reply->decrement('vote_count', 1);
		}
		elseif ($reply->votes()->ByWhom(Auth::user()->id)->WithType('downvote')->count())
		{
            // user already clicked downvote once
            $reply->votes()->ByWhom(Auth::user()->id)->WithType('downvote')->delete();
            $reply->votes()->create(['user_id' => Auth::user()->id, 'is' => 'upvote']);
            $reply->increment('vote_count', 2);
        } 
        else 
        {
            // first time click
            $reply->votes()->create(['user_id' => Auth::user()->id, 'is' => 'upvote']);
            $reply->increment('vote_count', 1);

            Notification::notify('reply_upvote', Auth::user(), $reply->user, $reply->topic, $reply);
        }
	}
}