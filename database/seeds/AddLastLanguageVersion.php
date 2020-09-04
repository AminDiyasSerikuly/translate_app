<?php

use Illuminate\Database\Seeder;

class AddLastLanguageVersion extends Seeder
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

        if ($xlsx = SimpleXLSX::parse(public_path('translate3.xlsx'))) {

            foreach ($xlsx->rows() as $key => $item) {
                if ($key != 0) {
                    \App\Translation::create([
                        'slug' => isset($item[$slug]) ? $item[$slug] : '',
                        'en_translate' => (isset($item[$en]) ? $item[$en] : ''),
                        'ru_translate' => (isset($item[$ru]) ? $item[$ru] : ''),
                        'kz_translate' => (isset($item[$kz]) ? $item[$kz] : ''),
                        'uz_translate' => (isset($item[$uz]) ? $item[$uz] : ''),
                        'oz_translate' => (isset($item[$oz]) ? $item[$oz] : ''),
                    ]);
                }
            }

            echo 'done!';
        } else {
            echo SimpleXLSX::parseError();
        }
    }
}
