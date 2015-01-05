<?php namespace Gtskk\Core;

interface CreatorListener
{
    public function creatorFailed($errors);
    public function creatorSucceed($model);
}