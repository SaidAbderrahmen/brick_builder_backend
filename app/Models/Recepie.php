<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recepie extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'type',
        'energie',
        'sugar',
        'calories',
        'fat',
        'serves',
        'time',
        'instructions',
        'picture',
    ];

    protected $searchableFields = ['*'];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
