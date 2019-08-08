<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Wagon
 *
 * @property int $id
 * @property int $creator_id
 * @property string $inw
 * @property \Illuminate\Support\Carbon|null $arrived_at
 * @property \Illuminate\Support\Carbon|null $detained_at
 * @property \Illuminate\Support\Carbon|null $released_at
 * @property \Illuminate\Support\Carbon|null $departed_at
 * @property string $detained_by
 * @property string $reason
 * @property string $cargo
 * @property string $forwarder
 * @property string $ownership
 * @property string $departure_station
 * @property string $destination_station
 * @property string $taken_measure
 * @property bool $is_empty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $creator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereArrivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereDepartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereDepartureStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereDestinationStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereDetainedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereDetainedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereForwarder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereInw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereIsEmpty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereOwnership($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereReleasedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereTakenMeasure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wagon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Wagon extends Model
{
    public const UNKNOWN_DETAINER = 'Неизвестная организация';

    public static $detainers = [
        'customs' => 'Таможенная служба',
        'technicals' => 'Служба вагонного хозяйства',
        'commercials' => 'Служба коммерческого хозяйства',
        'veterinaries' => 'Ветеринарный контроль',
        'phytosanitaries' => 'Фитосанитарный контроль',
        'expeditors' => 'Транспортно-экспедиционная организация',
        'others' => 'Другие организации',
    ];

    protected $guarded = [];

    protected $dates = ['arrived_at', 'detained_at', 'released_at', 'departed_at'];

    protected $casts = [
        'is_empty' => 'boolean'
    ];

    public function path()
    {
        return "/wagons/{$this->id}";
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function getDetainer()
    {
        return array_key_exists($this->detained_by, self::$detainers) ? self::$detainers[$this->detained_by] : 'Неизвестная организация';
    }

    // Mutators
    public function setArrivedAtAttribute($value)
    {
        $this->attributes['arrived_at'] = is_string($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : $value;
    }

    public function setDetainedAtAttribute($value)
    {
        $this->attributes['detained_at'] = is_string($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : $value;
    }

    public function setReleasedAtAttribute($value)
    {
        $this->attributes['released_at'] = is_string($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : $value;
    }

    public function setDepartedAtAttribute($value)
    {
        $this->attributes['departed_at'] = is_string($value) ? Carbon::createFromFormat('d.m.Y H:i', $value) : $value;
    }
}
