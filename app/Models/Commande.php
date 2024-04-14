<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $primaryKey = 'numcmd';
    protected $guarded = [];
    public function client()
    {
        return $this->belongsTo(Client::class, 'numcli', 'numcli');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'ref', 'ref');
    }
}
