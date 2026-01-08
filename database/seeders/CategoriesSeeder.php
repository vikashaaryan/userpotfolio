<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void {
        $categories = ['Web Designing','App Development','Billing Software'];
        foreach($categories as $cat){
            Category::create(['name'=>$cat]);
        }
    }
}
