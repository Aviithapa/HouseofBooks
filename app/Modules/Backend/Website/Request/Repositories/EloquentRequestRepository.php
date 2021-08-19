<?php


namespace App\Modules\Backend\Website\Request\Repositories;


use App\Models\Website\Request;
use App\Modules\Framework\RepositoryImplementation;

class EloquentRequestRepository extends RepositoryImplementation implements RequestRepository
{
    protected $entity_name="Request";

    public function getModel(){
        return new Request();
    }


    public function getDataWithPagination($limit)
    {
        // TODO: Implement getDataWithPagination() method.
    }
}
