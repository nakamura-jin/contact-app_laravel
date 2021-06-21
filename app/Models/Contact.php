<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'fullname' => 'required|max:250',
        'gender' => 'required',
        'email' => 'required|email|max:250',
        'postcode' => 'required|between:8,8',
        'address' => 'required|max:250',
        'building_name' => 'max:250',
        'opinion' => 'required'
    );
}
