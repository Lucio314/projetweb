<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $primaryKey = 'code';
    protected $guarded = [];
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'ref', 'ref');
    }
}
