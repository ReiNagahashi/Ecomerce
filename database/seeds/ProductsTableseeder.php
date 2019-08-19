<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class,29)->create();
    }
}
