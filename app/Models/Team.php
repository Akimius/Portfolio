<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'surname', 'position',  'preview', 'facebook', 'linked'];


}
