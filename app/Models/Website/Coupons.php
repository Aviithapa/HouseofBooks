<?php


namespace App\Models\Website;


use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table="coupons";
    protected $fillable=['coupons_name','discount','valid_date','status','count_used_coupons'];
}
