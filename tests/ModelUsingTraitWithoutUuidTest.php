<?php

// Copyright (C) 2022 Ivan Stasiuk <ivan@stasi.uk>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UidKeys\Tests;

use PDOException;
use BrokeYourBike\UidKeys\Tests\Fixtures\TestModelUsingTraitWithoutUuid4;

class ModelUsingTraitWithoutUuidTest extends TestCase
{
    /** @test */
    public function it_does_not_generate_a_uuid4_when_no_id_has_been_set(): void
    {
        $this->expectException(PDOException::class);

        TestModelUsingTraitWithoutUuid4::query()->create();
    }
}
