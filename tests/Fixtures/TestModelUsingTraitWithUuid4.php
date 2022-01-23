<?php

namespace BrokeYourBike\UidKeys\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use BrokeYourBike\UidKeys\Database\Eloquent\Uuid;

class TestModelUsingTraitWithUuid4 extends Model
{
    use Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test_model_with_uuids';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
