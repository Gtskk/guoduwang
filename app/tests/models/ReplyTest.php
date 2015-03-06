<?php

class ReplycTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testReplyBodyIsRequired()
	{
		// 新建话题
		$reply = new Reply;
		$reply->topic_id = 8;
		$reply->member_id = 1;

		// 成员保存不成功
		$this->assertFalse($reply->save());

		// 保存错误
		$errors = $reply->errors()->all();
		$this->assertCount(1, $errors);

		$this->assertEquals($errors[0], 'body必填。');
	}

}