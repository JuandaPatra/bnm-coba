<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'departement',
        'location', 
        'type',
        'description',
        'status',
        'user_id',
        'due_date',
        'subject_email'
    ];    
}
 