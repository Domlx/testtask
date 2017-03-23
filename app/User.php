<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'phone', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'user_id', 'id');
    }

    public function lastComment() //last_comment
    {
        return $this->hasOne(Comments::class)
            ->orderBy('id', 'desc');
    }

    public function search($keyword)
    {
        $query = '';
        if (trim($keyword) !='') {
            $query = DB::table('users')
                ->where("name", "LIKE","%$keyword%")
                ->orWhere("surname", "LIKE", "%$keyword%")
                ->orWhere("address", "LIKE", "%$keyword%")
                ->orWhere("phone", "LIKE", "%$keyword%")
                ->get();
        }
        return $query;
    }
}
