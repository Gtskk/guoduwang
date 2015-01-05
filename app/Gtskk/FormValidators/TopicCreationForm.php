<?php namespace Gtskk\FormValidators;

use Laracasts\Validation\FormValidator;

class TopicCreationForm extends FormValidator {

    /**
     * Validation rules for logging in
     *
     * @var array
     */
    protected $rules = [
		'title'   => 'required|min:2',
		'body'    => 'required|min:2',
		'node_id' => 'required|numeric'
    ];

}