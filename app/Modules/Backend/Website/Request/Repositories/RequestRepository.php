<?php


namespace App\Modules\Backend\Website\Request\Repositories;


use App\Modules\Framework\Repository;

interface RequestRepository extends Repository
{
    public function getModel();

    public function getDataWithPagination($limit);
}
