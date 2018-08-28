<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $table = 'prod_barcode';
    protected $primaryKey = 'barcode';
}
