<?php

namespace App\Console\Commands;

use App\Category;
use App\Product;
use Illuminate\Console\Command;

class AddProductsToCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brooks:add-products-to-categories {category_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add products to categories';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $category_id = $this->argument('category_id');
        $sub_categories = Category::where('parent_id', $category_id)->get(['id', 'name']);
        $sub_categories->each(function($sub_category) {
           $products = Product::where('tag', 'LIKE', '%' . $sub_category->name . '%')->pluck('id');
           //dd($products);
           $sub_category->products()->sync($products);
        });
    }
}
