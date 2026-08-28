<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Config;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'poste',
        /*  'couleur', */
        'adresse',
        'ville',
        'province',
        'code_postal',
        'compagnie',
        'image_header',
        'logo_header',
        'logo_footer',
        'color',
        'telephone',
        'slogan',
        'siteweb',
        'design_sans_plus',
        /* 'logo', */
        'photo',
        'slogan_en',
        'poste_en'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the fiches vendu for the fiche post.
     */
    public function fichesMaster()
    {
        return $this->hasMany('App\Fiche', 'user_id')->where('type', 'master');
    }

    /**
     * Get the fiches vendu for the fiche post.
     */
    public function getImageHeaderPathAttribute()
    {
        if (isset($this->image_header)) {
            return public_path('uploads/users/images/header/' . $this->image_header);
        } 
    }

    /**
     * Get the fiches vendu for the fiche post.
     */
    public function getLogoHeaderPathAttribute()
    {

        if (isset($this->logo_header)) {
            return public_path('uploads/users/logos/header/' . $this->logo_header);
        } else if (file_exists(public_path('images/compagnies/' . $this->compagnie . '-black.png'))) {
            return public_path('images/compagnies/' . $this->compagnie . '-black.png');
        }
    }

    /**
     * Get the fiches vendu for the fiche post.
     */
    public function getLogoFooterPathAttribute()
    {
        if (isset($this->logo_footer)) {
            return public_path('uploads/users/logos/footer/' . $this->logo_footer);
        } else if (file_exists(public_path('images/compagnies/' . $this->compagnie . '.png'))) {
            return public_path('images/compagnies/' . $this->compagnie . '.png');
        }
    }
    /**
     * Get the fiches vendu for the fiche post.
     */
    public function getColorAttribute()
    {
        if (isset($this->attributes['color'])) {
            return $this->attributes['color'];
        } else if (isset(Config::get('datas.compagnies')[$this->compagnie])) {
            return  Config::get('datas.compagnies')[$this->compagnie]['color'];
        } else {
            return "#000000";
        }
    }
}
