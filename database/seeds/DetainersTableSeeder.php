<?php

use Illuminate\Database\Seeder;
use App\Detainer;

class DetainersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('detainers')->truncate();

        DB::table('detainers')->insert([
            [
                'name' => 'Служба вагонного хозяйства',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Пункт коммерческого осмотра вагонов',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Таможенная служба',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Ветеринарный контроль',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Фитосанитарный контроль',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Пункт передачи вагонов',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Прочие',
                'idle_start_event' => Detainer::EVENT_RELEASED_AT
            ],
            [
                'name' => 'Местные вагоны',
                'idle_start_event' => Detainer::EVENT_CARGO_OPERATION_FINISHED_AT
            ]
        ]);
    }
}
