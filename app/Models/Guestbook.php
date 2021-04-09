<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;

    protected $table = 'guestbook';

    protected $fillable = [
        'user_id',
        'message',
        'parent_id',
    ];


    /*
     * relations
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Guestbook', 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany('App\Models\Guestbook', 'parent_id');
    }

    /*
     * functions
     */
    public function getTree()
    {

    }
}
