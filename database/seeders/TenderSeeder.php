<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $path = storage_path('app/database/test_task_data.csv');


        $data = File::get($path);

        $rows = explode("\n", $data);
        array_shift($rows); 

        foreach ($rows as $row) {
            if (trim($row) === '') continue;

            $columns = str_getcsv($row, ',', '"', '\\');

            if (count($columns) < 5) continue; 
            $external_code = $columns[0] ?? null;
            $number = $columns[1] ?? null;
            $status = $columns[2] ?? null;
            $name = $columns[3] ?? null;
            $date = $columns[4] ?? null;


            try {
                $date = \Carbon\Carbon::createFromFormat('d.m.Y H:i:s', trim($date));
            } catch (\Exception $e) {
                $date = now();
            }
            
            DB::table('tenders')->insert([
                'name' => substr($name, 0, 400),
                'status' => substr($status, 0, 50),
                'number' => substr($number, 0, 50),
                'external_code' => substr($external_code, 0, 40),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        $this->command->info("Данные успешно импортированы.");
    }
}
