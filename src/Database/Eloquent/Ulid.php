<?php

// Copyright (C) 2022 Ivan Stasiuk <ivan@stasi.uk>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

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
