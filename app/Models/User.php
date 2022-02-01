<?php

namespace App\Models;

use App\Events\UserViewed;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * @var string
     */
    public const ID_COL = 'id';

    /**
     * @var string
     */
    public const NAME_COL = 'name';

    /**
     * @var string
     */
    public const SURNAME_COL = 'surname';

    /**
     * @var string
     */
    public const EMAIL_COL = 'email';

    /**
     * @var string
     */
    public const FULL_NAME_COL = 'full_name';

    /**
     * @var string
     */
    public const VIEWS_COUNT_COL = 'views_count';

    /**
     * @var string
     */
    public const CREATED_AT_COL = 'created_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME_COL,
        self::SURNAME_COL,
        self::EMAIL_COL,
        'password',
    ];

    /**
     * @var array
     */
    protected $dispatchesEvents = [
        'retrieved' => UserViewed::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * append to array
     * 
     * @var array
     */
    protected $appends = [
        self::FULL_NAME_COL
    ];


    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->surname}";
    }


    /**
     * @param int $benchmark
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMostPopular($query, $benchmark = 10)
    {
        return $query->where(self::VIEWS_COUNT_COL, '>', $benchmark);
    }
}
