<?php

namespace BrokeYourBike\UidKeys\Database\Eloquent;

use Symfony\Component\Uid\Uuid as SymfonyUuid;
use Exception;

trait Uuid
{
    /**
     * Indicates if the IDs are UUIDs.
     *
     * @return bool
     */
    protected function keyIsUuid(): bool
    {
        return true;
    }

    /**
     * The UUID version to use.
     *
     * @return int
     */
    protected function uuidVersion(): int
    {
        return 4;
    }

    /**
     * The "booting" method of the model.
     */
    public static function bootUuid(): void
    {
        static::creating(function (self $model): void {
            // Automatically generate a UUID if using them, and not provided.
            if ($model->keyIsUuid() && empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = $model->generateUuid();
            }
        });
    }

    /**
     * @throws \Exception
     * @return string
     */
    protected function generateUuid(): string
    {
        switch ($this->uuidVersion()) {
            case 4:
                return (string) SymfonyUuid::v4();
        }

        throw new Exception("UUID version [{$this->uuidVersion()}] not supported.");
    }
}