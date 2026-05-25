<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function items()
    {
        return $this->hasMany(Item::class,"categorie_id","id");
    }
    
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    use SoftDeletes;
}
