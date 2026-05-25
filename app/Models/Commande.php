<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Image;
use App\Models\Price;
use App\Models\Client;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['nombre','price_id','item_id','categorie_id','client_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function Categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function Price(){
        return $this->belongsTo(Price::class);
    }
}
