<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    public $fillable = ['brand_name', 'product_name', 'merchant_name', 'custom_1', 'size', 'alternate_image','merchant_category','merchant_product_id','in_stock','display_price','base_price','description','suitable_for','material','colour','is_for_sale', 'currency','merchant_deep_link'];
    public function user(){
        return $this->belongsTo('App\User');
    }

}
