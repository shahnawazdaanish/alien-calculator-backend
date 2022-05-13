<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * A basic feature test load operations.
     *
     * @return void
     * @throws \Throwable
     */
    public function test_load_operations()
    {
        $response = $this->get('/api/v1/operations');
        $response->assertStatus(200)
            ->assertJsonFragment(['alias' => 'Alien']);

    }

    /**
     * A basic feature test calculate.
     *
     * @return void
     * @throws \Throwable
     */
    public function test_calculate()
    {
        $response = $this->post('/api/v1/calculate', ['operation' => 'Alien', 'inputs' => [5, 6]]);
        $response->assertStatus(200)
            ->assertExactJson([
                                  'result' => 11
                              ]);

    }
}
