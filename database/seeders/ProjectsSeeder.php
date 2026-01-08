<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Project::create([
            'category_id' => 1,
            'client_name' => 'Aman Traders',
            'title' => 'Business Website',
            'description' => 'Landing page + product listing',
            'tech_stack' => 'Laravel, Tailwind',
            'status' => 'Completed'
        ]);

        Project::create([
            'category_id' => 2,
            'client_name' => 'TechHub',
            'title' => 'Inventory App',
            'description' => 'Stock tracking mobile app',
            'tech_stack' => 'Flutter, Firebase',
            'status' => 'In Progress'
        ]);

        Project::create([
            'category_id' => 3,
            'client_name' => 'SmartMart',
            'title' => 'Billing Software',
            'description' => 'Invoice + GST system',
            'tech_stack' => 'Laravel, MySQL',
            'status' => 'Pending'
        ]);
    }
}
