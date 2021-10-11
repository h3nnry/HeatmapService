<?php

namespace Tests\Unit;

use App\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class LogTest extends TestCase
{
    use WithFaker;

    /**
     * @return void
     */
    public function testCreateLog()
    {
        $log = factory(Log::class)->create();

        $this->assertArrayHasKey('id', $log->toArray());
    }
}
