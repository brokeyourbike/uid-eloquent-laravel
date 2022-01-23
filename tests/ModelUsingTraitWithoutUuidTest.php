<?php

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
