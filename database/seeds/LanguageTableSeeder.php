<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            'English',
            'Afrikaans',
            'Sotho',
            'Zulu',
            'Tsonga',
            'Other'
        ];

        for ($i = 0; $i < count($languages); $i++)
        {
            if (!Language::where('name', $languages[$i])->count())
            {
                $task = new Language();
                $task->name = $languages[$i];
                $task->save();
            }
        }
    }
}
