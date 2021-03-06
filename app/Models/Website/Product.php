<?php


namespace App\Models\Website;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    protected $fillable = ['name','description','price','quantity','image','semester','faculty','edition','university','discount','publication','excerpt','user_id',"category","status","author","sub_category","nobel_category","level","best_selling","condition","give_away","sold_out","youtube_link","middle_image","last_image"];

    public function getDicountedPrice()
    {
        $price=$this->price * (1 - $this->discount / 100);
        return  round($price,0);
    }
    public function getImage(){
        if(isset($this->image)) {
            return uploadedAsset('product_image', $this->image);
        }
        else {
            return imageNotFound();
        }
    }
    public function getMiddleImage(){
        if(isset($this->middle_image)) {
            return uploadedAsset('product_middle_image', $this->middle_image);
        }
        else {
            return imageNotFound();
        }
    }
    public function getlastImage(){
        if(isset($this->last_image)) {
            return uploadedAsset('product_last_image', $this->last_image);
        }
        else {
            return imageNotFound();
        }
    }
    public function getSecondHandFrontImage(){
        if(isset($this->image)) {
            $image = explode(",", $this->image);
            return uploadedAsset('product_image', $image[0]);
        }
        else {
            return imageNotFound();
        }
    }
    public function getSecondHandBackImage(){
        if(isset($this->image)) {
            $image = explode(",", $this->image);
            return uploadedAsset('product_image', $image[1]);
        }
        else {
            return imageNotFound();
        }
    }

    public function getSecondHandEditionImage(){
        if(isset($this->image)) {
            $image = explode(",", $this->image);
            return uploadedAsset('product_image', $image[2]);
        }
        else {
            return imageNotFound();
        }
    }
}
