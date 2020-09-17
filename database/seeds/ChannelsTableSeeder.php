<?php

use App\Channel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
         'name'=>'Laravel 7',
         'slug'=>Str::slug('Laravel 7')
        ]);

        Channel::create([
          'name'=>'Vue js 5',
          'slug'=>Str::slug('Vue js 5')
        ]);

        Channel::create([
           'name'=>'React 16',
           'slug' => Str::slug('React 16')
        ]);

        Channel::create([
            'name'=>'Angular 7',
            'slug' => Str::slug('Angular 7')
         ]);

    }
}
