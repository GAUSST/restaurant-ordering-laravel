<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Price;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function image(){
        return $this->hasOne(Image::class,"item_id");
    }

    public function price(){
        return $this->hasOne(Price::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
