<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventList extends Model
{
    use HasFactory;

    protected $table = 'events_list';
    protected $fillable = [
        'title',
        'description',
        'date',
    ];
}
