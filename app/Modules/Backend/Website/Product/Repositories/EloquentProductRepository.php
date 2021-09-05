<?php


namespace App\Modules\Backend\Website\Product\Repositories;


use App\Models\Website\Product;
use App\Modules\Framework\RepositoryImplementation;

class EloquentProductRepository extends RepositoryImplementation implements ProductRepository
{
        protected $entity_name="Product";

        public function getModel(){
            return new Product();
        }

        public function getAll()
        {
            return $this->getModel()->where('status', 'active')->get();
        }

    public function getAllInActive()
    {
        return $this->getModel()->where('status', 'in-active')->get();
    }

    public function getDataWithPagination($limit=null)
    {
        if($limit)
            return $this->getModel()->latest()->paginate($limit);
        return $this->getModel()->latest()->paginate($this->paginate);

    }

    public function BrandNewBook($category){
            return $this->getModel()->where('sub_category',$category)
                                    ->where('category', 'brand-new')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(8)
                                    ->get();
    }
    public function Nobel($nobel_category){
        return $this->getModel()->where('nobel_category',$nobel_category)
            ->where('category','brand-new')
            ->where('best_selling','yes')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }

    public function secondHand($sub_category){
        return $this->getModel()->where('category','second-hand')
            ->where('status','active')
            ->where('sub_category',$sub_category)
            ->where('sold_out', "!=" ,'yes')
            ->get();
    }

    public function coursebook($level){
       return $this->getModel()->where('sub_category','coursebook')
           ->where('status','active')
           ->where('category','brand-new')
           ->where('level','+2')
           ->orderBy('created_at', 'desc')
           ->limit(10)
           ->get();
    }}
