<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuario extends RModel implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = "usuarios";

    protected $fillable =['email','login', 'password', 'nome'];

    public function getAuthIdentifierName(){
        return $this->getKey();
    }

    public function getAuthIdentifier(){
        return $this->login;

    }
    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberToken(){
        return $this->remember_token; 
    }

    public function setRememberToken($value){
        $this->remember_token = $value; 
    }

    public function getRememberTokenName(){
        return 'remember_token'; 

    }
}
