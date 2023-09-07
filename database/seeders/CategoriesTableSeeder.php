<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [
            [
                'name:ar' => 'رجالي ',
                'name:en' => 'Mens',
            ],
            [
                'name:ar' => 'حريمي ',
                'name:en' => 'Womens',
            ],
            [
                'name:ar' => 'أطفالي ',
                'name:en' => 'Children',
            ],
        ];

        $data = [
            [
                'name:ar' => 'نظارات شمسية',
                'name:en' => 'Sunglasses',
            ],
            [
                'name:ar' => 'نظارات طبية',
                'name:en' => 'Eyeglasses',
            ],
            [
                'name:ar' => 'نظارات مودرن',
                'name:en' => 'Progressives',
            ],
            [
                'name:ar' => 'نظارات بلو لايت',
                'name:en' => 'Blue Light',
            ],
        ];

        foreach ($parents as $parent_data) {
            $parent              = Category::whereTranslation('name', $parent_data['name:en'], 'en')->firstOrNew();
            $parent->{"name:ar"} = $parent_data['name:ar'];
            $parent->{"name:en"} = $parent_data['name:en'];
            $parent->save();

            foreach ($data as $child_data) {
                $child              = Category::where('parent_id', $parent->id)->whereTranslation('name', $parent_data['name:en'], 'en')->firstOrNew();
                $child->{"name:ar"} = $child_data['name:ar'];
                $child->{"name:en"} = $child_data['name:en'];
                $child->parent_id   = $parent->id;
                $child->save();
            }
        }
    }
}
