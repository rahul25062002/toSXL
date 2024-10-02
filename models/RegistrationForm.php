<?php
namespace app\models;

use Yii;
use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $confirmPassword;

    public $email;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'confirmPassword','email'], 'required'],
            // username must be unique
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            // password and confirmPassword must match
            ['confirmPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords do not match.'],
            // password should be validated (e.g., length, format)
            ['password', 'string', 'min' => 6],

            ['email', 'email']
        ];
    }
}
