<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewHeaderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBrand()
    {
        $this->get('/')->assertSee('IntraSAIN');
    }
}
