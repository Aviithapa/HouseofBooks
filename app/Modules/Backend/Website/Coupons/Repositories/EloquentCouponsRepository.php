<?php


namespace App\Modules\Backend\Website\Coupons\Repositories;

use App\Models\Website\Coupons;
use App\Modules\Framework\RepositoryImplementation;

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
}
