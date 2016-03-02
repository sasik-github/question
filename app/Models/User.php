<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 4:51 PM
 */

namespace App\Models;


class User
{

    public static $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
    ];

    public $firstname;
    public $lastname;
    public $email;
    public $ip_address;

    /**
     * @var mixed
     */
    private $storage;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->storage = session();
    }

    public function fill($attributes)
    {
        $this->storage->put($attributes);
        
    }

    public function getFirstName()
    {
        return $this->storage->get('firstname');
    }

    public function getLastName()
    {
        return $this->storage->get('lastname');
    }

    public function getIp()
    {
        return $this->storage->get('ip_address');
    }

    public function getEmail()
    {
        return $this->storage->get('email');
    }

    public function setSuccess()
    {
        return $this->_setSuccess(true);
    }

    public function setQuestionAnswered($value)
    {
        $this->storage->put('question_answered', $value);
    }

    public function getQuestionAnswered()
    {
        return $this->storage->get('question_answered', false);
    }

    public function getSuccess()
    {
        $success = $this->storage->get('success');
        if (!$success) {
            $success = $this->_setSuccess(false);
        }
        return $success;
    }

    private function _setSuccess($value)
    {
        return $this->storage->put(['success' => $value]);
    }
}
