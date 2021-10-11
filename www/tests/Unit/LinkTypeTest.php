<?php

namespace Tests\Unit;

use Tests\TestCase;

class LinkTypeTest extends TestCase
{

    /**
     * @return void
     */
    public function testHasAllLinkTypes()
    {
        $this->assertDatabaseHas('link_types', [
            'type' => 'product'
        ]);

        $this->assertDatabaseHas('link_types', [
            'type' => 'category'
        ]);

        $this->assertDatabaseHas('link_types', [
            'type' => 'static-page'
        ]);

        $this->assertDatabaseHas('link_types', [
            'type' => 'checkout'
        ]);

        $this->assertDatabaseHas('link_types', [
            'type' => 'homepage'
        ]);
    }
}
