<?php 
$I = new AcceptanceTester($scenario);
$I->am('网站用户');
$I->wantTo('登陆这个网站');
$I->lookForwardTo('看到我想看到的，玩到我想玩的');
$I->amOnPage('/members/login');
$I->fillField('username', 'gtskk');
$I->fillField('password', '6399998');
$I->click('login_require');
$I->seeInTitle('过渡网');