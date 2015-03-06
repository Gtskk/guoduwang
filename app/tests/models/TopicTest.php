<?php

class TopicTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testTopicTitleIsRequired()
	{
		// 新建话题
		$topic = new Topic;
		$topic->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, distinctio! Excepturi aspernatur neque itaque harum amet repellat illum commodi deserunt, fugiat ut necessitatibus in voluptate adipisci alias, ipsum accusantium. Beatae.';
		$topic->node_id = 8;
		$topic->member_id = 1;

		// 成员保存不成功
		$this->assertFalse($topic->save());

		// 保存错误
		$errors = $topic->errors()->all();
		$this->assertCount(1, $errors);

		$this->assertEquals($errors[0], 'title必填。');
	}

}