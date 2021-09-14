<?php


namespace App\Modules\Backend\Website\Coupons\Repositories;


use App\Modules\Framework\Repository;

interface CouponsRepository extends Repository
{
    public function Coupon($coupon);
}
