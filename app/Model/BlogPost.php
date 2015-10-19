<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class BlogPost extends Eloquent implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    public function blog_images() {
        return $this->hasMany('App\Model\BlogImage');
    }

    public function users() {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function blog_location(){
        return $this->hasOne('App\Model\BlogLocation');
    }
}
