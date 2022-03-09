<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\User;

class Archive extends Model
{
    use HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'catalogue_number',
        'content',
        'sound_type',
        'date',
        'season',
        'time_of_day',
        'type_of_location',
        'location',
        'recordist',
        'artist',
        'length',
        'device_recorder',
        'format_quality',
        'access_and_license',
        'tags',
        'media',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
