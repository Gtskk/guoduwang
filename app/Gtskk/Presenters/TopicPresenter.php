<?php namespace Gtskk\Presenters;

use Laracasts\Presenter\Presenter;
use Input, URL, Request;

class TopicPresenter extends Presenter
{
    public function topicFilter($filter)
    {
        $node_id = Request::segment(2);
        $node_append = '';
        if($node_id)
        {
            $link = URL::to('nodes', $node_id) . '?filter=' . $filter;
        }
        else
        {
            $query_append = '';
            $query = Input::except('filter', '_pjax');
            if ($query)
            {
                $query_append = '&'.http_build_query($query);
            }
            $link = URL::to('topics') . '?filter=' . $filter . $query_append . $node_append;
        }

        $selected = Input::get('filter') ? (Input::get('filter') == $filter ? ' class="selected"':'') : '';

        return 'href="' . $link . '"' . $selected;
    }

    public function haveDefaultNode($node, $snode)
    {
        if (count($node) && ($snode && $node->id == $snode->id ))
            return true;

        if (Input::old('node_id') && ( $snode && Input::old('node_id') == $snode->id))
            return true;

        return false;
    }

}