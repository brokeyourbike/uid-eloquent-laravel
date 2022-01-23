<?php

namespace BrokeYourBike\UidKeys\Database\Eloquent;

use Symfony\Component\Uid\Ulid as SymfonyUlid;

trait Ulid
{
    /**
     * Indicates if the IDs are ULIDs.
     *
     * @return bool
     */
    protected function keyIsUlid(): bool
    {
        return true;
    }

    /**
     * The "booting" method of the model.
     */
    public static function bootUlid(): void
    {
        static::creating(function (self $model): void {
            // Automatically generate a ULID if using them, and not provided.
            if ($model->keyIsUlid() && empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = $model->generateUlid();
            }
        });
    }

    /**
     * @return string
     */
    protected function generateUlid(): string
    {
        return (string) new SymfonyUlid();
    }
}
