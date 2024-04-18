<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function teste_com_nome_grande_o_professor_e_maluco()
    {
        // Arrange
        $repository = $this->app->make(SeriesRepository::class);
        $request = new SeriesFormRequest();
        $request->nome = "nome serei";
        $request->seasonsQty = 1;
        $request->episodesPerSeason = 1;

        // ACT
        $repository->add($request);

        // ASSERT
        $this->assertDatabaseHas('series', ['nome' => 'nome serei', ]);
        $this->assertDatabaseHas('seasons', ['number' => 1, ]);
        $this->assertDatabaseHas('episodes', ['number' => 1, ]);
    }
}
