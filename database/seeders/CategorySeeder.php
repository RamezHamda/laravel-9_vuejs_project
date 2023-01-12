<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();

        $categories = [
            [
                'name' => 'أعمال وخدمات استشارية'
            ],
            [
                'name' => 'برمجة، تطوير المواقع والتطبيقات'
            ],
            [
                'name' => 'هندسة، عمارة وتصميم داخلي'
            ],
            [
                'name' => 'تصميم، فيديو وصوتيات'
            ],
            [
                'name' => 'تسويق إلكتروني ومبيعات'
            ],
            [
                'name' => 'كتابة، تحرير، ترجمة ولغات'
            ],
        ];

        Category::insert($categories);
    }
}
