<?php

// Copyright (C) 2022 Ivan Stasiuk <ivan@stasi.uk>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UidKeys\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Foundation\Application;
use Illuminate\Database\Schema\Blueprint;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase(Application $app): void
    {
        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_model_with_uuids', function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->timestamps();
            });

        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_model_with_ulids', function (Blueprint $table): void {
                $table->char('id', 26)->primary();
                $table->timestamps();
            });

        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_model_without_uuids', function (Blueprint $table): void {
                $table->string('id')->primary();
                $table->timestamps();
            });

        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_model_without_ulids', function (Blueprint $table): void {
                $table->string('id')->primary();
                $table->timestamps();
            });
    }
}
