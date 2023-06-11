<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table = 'matches';
    protected $primaryKey = 'id';

    protected $casts = [
        'match_date' => 'datetime',
        'team1_id' => 'int',
        'team2_id' => 'int',
        'rozgrywki_w_id' => 'int' // assuming the name of the field is rozgrywki_w_id
    ];

    protected $fillable = [
        'match_date',
        'score',
        'team1_id',
        'team2_id',
        'link',
        'rozgrywki_w_id' // add this field to the fillable array
    ];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    public function users()
    {
        return $this->belongsToMany(User2::class, 'match_user', 'match_id', 'user2_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    public function rozgrywkiW()
    {
        return $this->belongsTo(RozgrywkiW::class, 'rozgrywki_w_id');
    }
}