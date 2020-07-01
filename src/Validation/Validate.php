<?php

namespace Phpkain\Validation;

use Phpkain\Validation\Rules\UniqueRule;
use Rakit\Validation\Validator;
use Phpkain\Session\Session;
use Phpkain\Http\Request;
use Phpkain\Url\Url;

class Validate {
    /**
     * Validation constructor
     */
    private function __construct() {}

    /**
     * Validate request
     *
     * @param array $rules
     * @param bool $json
     *
     * @return mixed
     */
    public static function validate(Array $rules, $json) {
        $validator = new Validator;

        $validator->addValidator('unique', new UniqueRule());
        $validation = $validator->validate($_POST + $_FILES, $rules);
        $errors = $validation->errors();

        if ($validation->fails()) {
            if ($json) {
                return ['errors' => $errors->firstOfAll()];
            } else {
                Session::set('errors', $errors);
                Session::set('old', Request::all());
                return Url::redirect(Url::previous());
            }
        }
    }
}
