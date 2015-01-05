<?php namespace Gtskk\SiteStats;

use Topic, Reply, Member, Cache;

class Stat
{
    const CACHE_KEY     = 'site_stat';
    const CACHE_MINUTES = 10;

    public function getSiteStat()
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_MINUTES, function()
        {
            $entity = new StatEntity();
            $entity->topic_count = Topic::count();
            $entity->reply_count = Reply::count();
            $entity->member_count  = Member::count();
            return $entity;
        });
    }
}
