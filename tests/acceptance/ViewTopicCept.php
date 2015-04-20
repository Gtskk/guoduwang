<?php 
$I = new AcceptanceTester($scenario);
$I->am('a website user');
$I->wantTo('view topics');
$I->lookForwardTo('see what I am interested in');
$I->amOnPage('/topics');
$I->canSeeNumberOfElements('.topiclist list-group-item', [0, 10]);