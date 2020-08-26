<?php

use Illuminate\Database\Seeder;

class ImportFromExcelToMysql extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slug = 0;
        $ru = 1;
        $en = 2;
        $kz = 3;
        $uz = 4;
        $oz = 5;

        if ($xlsx = SimpleXLSX::parse(public_path('translate.xlsx'))) {
            foreach ($xlsx->rows() as $key => $item) {
                if ($key != 0) {
                    \App\Translation::create([
                        'slug' => $item[$slug],
                        'en_translate' => $item[$en],
                        'ru_translate' => $item[$ru],
                        'kz_translate' => $item[$kz],
                        'uz_translate' => $item[$uz],
                        'oz_translate' => $item[$oz],
                    ]);
                }
            }

            echo 'done!';
        } else {
            echo SimpleXLSX::parseError();
        }
    }
}
