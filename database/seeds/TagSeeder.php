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
        $tags = ['sport', 'calcio', 'tech', 'spazio', 'cronaca'];

        foreach ($tags as $tag){
            $tagDB = new Tag();
            $tagDB->name = $tag;
            $tagDB->save();
        }
    }
}
