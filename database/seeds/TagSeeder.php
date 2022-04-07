<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->label = 'windows';
        $tag->color = '#222222';
        $tag->save();

        $tag = new Tag();
        $tag->label = 'linux';
        $tag->color = '#808080';
        $tag->save();

        $tag = new Tag();
        $tag->label = 'mac';
        $tag->color = '#101010';
        $tag->save();
    }
}
