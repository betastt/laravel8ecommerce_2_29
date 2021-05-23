<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products"; 

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function personalizacionCafe()
    {
        return $this->belongsTo(PersonalizacionCafe::class, 'personalizacioncafe_id');
    }

    public function presentacionProducto()
    {
        return $this->belongsTo(PresentacionProducto::class, 'presentacionproducto_id');
    }

    public function impuesto()
    {
        return $this->belongsTo(Impuesto::class, 'impuesto_id');
    }
}
