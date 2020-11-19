<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable=['name_en','description_en','name_ar','description_ar' ,'price','photo','viewCount'];

}
