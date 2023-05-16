<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RozgrywkiW
 *
 * @property int $id_ro
 * @property string $nazwa_ro
 *
 * @property Collection|MeczRuch[] $mecz_ruches
 * @property Collection|MeczWidzew[] $mecz_widzews
 *
 * @package App\Models
 */
class RozgrywkiW extends Model
{
    use CrudTrait;
	protected $table = 'rozgrywkiW';
    protected $primaryKey = 'id_ro';
    public $timestamps = false;

    protected $fillable = [
        'nazwa_ro'
    ];

    public function mecz_ruches()
    {
        return $this->hasMany(MeczRuch::class, 'id_ro');
    }

    public function mecz_widzews()
    {
        return $this->hasMany(MeczWidzew::class, 'id_ro');
    }
}
