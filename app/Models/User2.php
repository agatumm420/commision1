<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
class User2 extends Model  implements AuthenticatableContract
{
    use CrudTrait;
    use HasFactory;
    use Authenticatable;

    protected $table = 'user2';
    public $timestamps = false;

    protected $casts = [
        'km' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'login',
        'password',
        'km',
        'email',
        'aktwn_u'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id'; // your primary key
    }

    public function matches()
    {
        return $this->belongsToMany(Match::class, 'match_user', 'user2_id', 'match_id');
    }


    public function meczRuches()
    {
        return $this->belongsToMany(MeczRuch::class, 'mecz_ruch_user', 'user2_id', 'mecz_ruch_id');
    }

    public function meczWidzews()
    {
        return $this->belongsToMany(MeczWidzew::class, 'mecz_widzew_user', 'user2_id', 'mecz_widzew_id');
    }

}
