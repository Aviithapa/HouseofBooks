<?php


namespace App\Modules\Backend\Website\Coupons\Repositories;

use App\Models\Website\Coupons;
use App\Modules\Framework\RepositoryImplementation;
use Carbon\Carbon;

class EloquentCouponsRepository extends RepositoryImplementation implements CouponsRepository
{
    protected $entity_name="coupons";
    /**
     * @inheritDoc
     */
    public function getModel()
    {
        return new Coupons();
    }

    public function Coupon($coupon){
        return $this->getModel()->where('coupons_name',$coupon)
            ->whereDate('valid_date', '>', Carbon::now()->toDateString())
            ->value('discount');
    }
}
