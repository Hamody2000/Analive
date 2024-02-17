<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class woocommerceconection extends Model
{
    use HasFactory;
    protected $table    = 'woocommerce_conections';
    protected $fillable = [
        'store_id',
        'theme_id',
        'module',
        'woocomerce_id',
        'original_id'
    ];

    public function woocomconection()
    {
        return $this->hasOne(MainCategory::class, 'original_id', 'id')->first();

    }
}