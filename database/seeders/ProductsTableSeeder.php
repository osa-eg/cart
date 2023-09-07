<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images    = [];
        $directory = public_path('cart_images');
        $faker     = Factory::create();

        foreach (scandir($directory) as $file) {
            if ($file !== '.' && $file !== '..') {
                $images[] = $directory . '/' . $file;
            }
        }

        foreach (Category::childrens()->get() as $category) {
            for ($i = 0; $i <= 4; $i++) {
                $product                     = new Product();
                $product->category_id        = $category->id;
                $product->qty                = random_int(1, 10000);
                $product->price              = random_int(1, 10000);
                $product->active             = $faker->boolean(25);
                $product->{"name:ar"}        = $faker->sentence(3);
                $product->{"name:en"}        = $faker->sentence(3);
                $product->{"slug:ar"}        = $faker->slug() . random_int(1, 10000);
                $product->{"slug:en"}        = $faker->slug() . random_int(1, 10000);
                $product->{"description:ar"} = $faker->text(500);
                $product->{"description:en"} = $faker->text(500);
                $product->save();

                if (!$product->hasMedia()) {
                    for ($n = 1; $n <= 3; $n++) {
                        $product->addMedia($images[random_int(0, count($images) - 1)])
                            ->preservingOriginal()
                            ->toMediaCollection('images');
                    }
                }
            }
        }
    }
}
