<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('name', 'email', 'password');
    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    //auth
    public function register() {
        $this->password = Hash::make($this->password);
        $this->activationCode = $this->generateCode();
        $this->isActive = false;
        $this->save();

        Log::info("User [{$this->email}] registered. "
        . "Activation code: {$this->activationCode} "
        . "http://".$_SERVER['HTTP_HOST']."/auth/activate/{$this->id}/{$this->activationCode}");

        // $this->sendActivationMail();

        return $this->id;
    }
    public function sendActivationMail() {
        $activationUrl = action(
            'AuthController@getActivate',
            array(
                'userId' => $this->id,
                'activationCode'    => $this->activationCode,
            )
        );

        $that = $this;
        Mail::send('emails/activation',
            array('activationUrl' => $activationUrl),
            function ($message) use($that) {
                $message->to($that->email)->subject('Тhank you for registration!');
            }
        );
    }

    public function activate($activationCode) {
        if ($this->isActive) {
            return false;
        }
        if ($activationCode != $this->activationCode) {
            return false;
        }
        $this->activationCode = '';
        $this->isActive = true;
        $this->save();
        //запишем информацию в лог, просто, чтобы была :)
        Log::info("User [{$this->email}] successfully activated");

        return true;
    }

    protected function generateCode() {
        return Str::random(); // По умолчанию длина случайной строки 16 символов
    }
}
