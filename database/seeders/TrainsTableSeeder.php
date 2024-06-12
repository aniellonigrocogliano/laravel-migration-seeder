<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Factory as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');
        $stazioni = ['Roma Termini', 'Milano Centrale', 'Venezia Santa Lucia', 'Firenze Santa Maria Novella', 'Napoli Centrale', 'Torino Porta Nuova', 'Bologna Centrale', 'Genova Piazza Principe', 'Verona Porta Nuova', 'Palermo Centrale', 'Bari Centrale', 'Catania Centrale', 'Padova', 'Pisa Centrale', 'Trieste Centrale', 'Ancona', 'Reggio Calabria Centrale', 'Messina Centrale', 'Salerno', 'Pescara Centrale', 'Perugia', 'Livorno Centrale', 'Trento', 'Bolzano', 'La Spezia Centrale'];

        for ($i = 0; $i < 50; $i++) {
            $stazione_partenza = $faker->randomElement($stazioni);

            do {
                $stazione_arrivo = $faker->randomElement($stazioni);
            } while ($stazione_arrivo == $stazione_partenza);
            $orario_partenza = $faker->dateTimeBetween('-1 week', '+4 week');
            $orario_arrivo = (clone $orario_partenza)->modify('+' . $faker->numberBetween(1, 360) . ' minutes');
            $newTrain = new Train();
            $newTrain->azienda = $faker->randomElement(['Trenitalia', 'Italo', 'Trenord', 'Ferrovie del Sud Est', 'Ferrovie del Gargano']);
            $newTrain->stazione_partenza = $stazione_partenza;
            $newTrain->stazione_arrivo = $stazione_arrivo;
            $newTrain->codice_treno = $faker->randomNumber(4, true);
            $newTrain->orario_arrivo = $orario_arrivo;
            $newTrain->orario_partenza = $orario_partenza;
            $newTrain->in_orario = $faker->randomElement([false, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true]);
            $newTrain->cancellato = $faker->randomElement([true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false]);
            $newTrain->save();
        };
    }
}
