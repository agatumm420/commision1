<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User2
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $km
 * @property string $email
 *
 * @package App\Models
 */
class User2 extends Model
{
    use CrudTrait;
    use HasFactory;
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

}
