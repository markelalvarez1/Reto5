<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    // OPCIONAL Especificar el nombre de la tabla asociada en la BD
    // protected $table = productitos; //De este modo NO INTENTA VINCULARSE CON products
    /*protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];*/
    /*protected $guarded = [
        'password'
    ]*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
