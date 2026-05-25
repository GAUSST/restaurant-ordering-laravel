<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['content','item_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
