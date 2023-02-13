<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sug extends Model
{
    use HasFactory;
    protected $table="sug";
    protected $fillable =['name','address','number','sug'];
}
