<?php 
$I = new AcceptanceTester($scenario);
$I->am('a website user');
$I->wantTo('login in');
$I->lookForwardTo('can see and play what I want');
$I->amOnPage('/members/login');
$I->fillField('username', 'gtskk');
$I->fillField('password', '6399998');
$I->click('login_require');
$I->seeInTitle('过渡网');