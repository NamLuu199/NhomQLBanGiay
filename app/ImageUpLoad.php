<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $table = 'image_uploads';
    // protected $primaryKey ='id';
    protected $fillable = ['item_id'];
    //
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
