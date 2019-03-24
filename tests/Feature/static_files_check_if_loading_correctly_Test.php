<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class static_files_check_if_loading_correctly extends TestCase
{
    /**
     * Testing if index page returns a 200 server code (sucess) and asserts
     * if there is 'clinica de ser' and 'Sinta-se bem consigo mesmo' in order
     */
    /** @test */
    public function index_page_loads_correctly()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSeeInOrder(['Clínica de Ser', 'Sinta-se bem consigo mesmo']);

    }
    /**
     * Test if the page terapias is giving a status of 200 (sucess) or some text
     */
    /** @test */
    public function terapias_page_loads_correctly()
    {
        $response = $this->get(route('terapias'));

        $response->assertStatus(200);
        $response->assertSeeInOrder(['Naturopatia',
        'Cura Multidimensional',
        'Reiki',
        'Mesa Radiónica Multidimensional',
        'Thetahealing']);
    }
    /**
     * Test if the page workshops is giving a status of 200 (sucess)
     */
    /** @test */
    public function workshops_page_loads_correctly()
    {
        $response = $this->get(route('workshops'));

        $response->assertStatus(200);
    }

    /**
     * Test if the page contactos is giving a status of 200 (sucess)
     */
    /** @test */
    public function Contactos_page_loads_correctly()
    {
        $response = $this->get(route('terapias'));

        $response->assertStatus(200);
    }
}
