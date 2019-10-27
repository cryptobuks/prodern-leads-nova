<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'Neu',
            'Telefontermin',
            'Telefontermin proDERM',
            'Termin Neuaufnahme',
            'Tel. nicht erreicht',
            'Auf AB gesprochen',
            'Email geschickt',
            'No Response',
            'Nicht erschienen',
            'Kein Interesse',
            'Nicht geeignet',
            'Wiedervorlage',
            'Sonstiges',
            'Aufgenommen'
        ];

        foreach ($status as $item) {
            DB::table('statuses')->insert([
                'name' => $item
            ]);
        }
    }
}
