<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Annexe extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'fiche_id',
        'name',
        'file',
    ];

    public function getFileLinkAttribute()
    {
        return asset('uploads/annexes/' . md5($this->id) . ".pdf?t=" . time());
    }
}
