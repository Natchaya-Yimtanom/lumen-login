<?php
namespace Quinn\Login;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'login';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
}