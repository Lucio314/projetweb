<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;
    protected $primaryKey = 'ref';
    public $incrementing = false;
    protected $guarded = [];
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'ref', 'ref');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'code', 'code');
    }
    public function imageUrl()
    {
        return Storage::disk('public')->url($this->imageprod);
    }
}
