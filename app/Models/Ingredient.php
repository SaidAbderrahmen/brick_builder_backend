<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'unit', 'quantity', 'recepie_id'];

    protected $searchableFields = ['*'];

    public function recepie()
    {
        return $this->belongsTo(Recepie::class);
    }
}
