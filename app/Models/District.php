<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'username',
        'password',
        'display_name',
        'districts_id',
        'description',
        'code',
        'title',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
}
