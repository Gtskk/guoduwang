<?php

class NodesController extends BaseController {

	public function show($id)
	{
		$node = Node::findOrFail($id);
        $nodes  = Node::allLevelUp();
		$filter = $this->topic->present()->getTopicFilter();
		$topics = $this->topic->getNodeTopicsWithFilter($filter, $id);

		return View::make('theme::topics.index', compact('topics', 'node', 'nodes'));
	}

}