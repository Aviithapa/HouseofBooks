<?php


namespace App\Models\Website;


use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table="request";
    protected $fillable=['name','email',"phoneNumber","bookName","faculty","publication","message"];
}
