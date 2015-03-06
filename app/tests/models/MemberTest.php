<?php

class MemberTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testMemberEmailIsRequired()
	{
		// 新建成员
		$memeber = new Member;
		$memeber->username = 'okjkjk';
		$memeber->password = 'password';
		$memeber->password_confirmation = 'password';

		// 成员保存不成功
		$this->assertFalse($memeber->save());

		// 保存错误
		$errors = $memeber->errors()->all();
		$this->assertCount(1, $errors);

		$this->assertEquals($errors[0], 'email必填。');
	}

}