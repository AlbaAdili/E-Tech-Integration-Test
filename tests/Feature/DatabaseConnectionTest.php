<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function test_database_connection_is_sqlite(): void
    {
        $this->assertEquals('sqlite', DB::connection()->getDriverName());
    }
}
