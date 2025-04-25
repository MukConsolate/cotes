<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cote extends Model
{
    /** @use HasFactory<\Database\Factories\CoteFactory> */
    use HasFactory;
    public $fillable = ['etudiant_id', 'cours', 'note'];
}
