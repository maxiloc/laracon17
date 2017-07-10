<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $speakers = yaml_parse_file(__DIR__.'/speakers.yaml');
        $speakers = json_decode(json_encode($speakers));

        $event = \App\Conference::firstOrNew([
            'id' => 1
        ]);
        $event->name = 'Laracon US';
        $event->year = 2017;
        $event->location = 'US';
        $event->save();

        $event = \App\Conference::firstOrNew([
            'id' => 2
        ]);
        $event->name = 'Laracon EU';
        $event->year = 2017;
        $event->location = 'EU';
        $event->save();


        foreach ($speakers as $speaker) {
            $s = new App\Speaker();
            $s->name = $speaker->name;
            $s->title = $speaker->title;
            $s->save();

            if (in_array('EU', $speaker->events)) {
                $s->conferences()->attach(2);
            }

            if (in_array('US', $speaker->events)) {
                $s->conferences()->attach(1);
            }

        }
    }
}
