<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'subject',
        'message',
        'created_at',
    ];
    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
