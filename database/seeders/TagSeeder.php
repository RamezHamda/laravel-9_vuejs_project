<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();

        $tags = [
            [ 'name' => 'العربية' ],
            [ 'name' => 'الإنجليزية' ],
            [ 'name' => 'تصميم شعار' ],
            [ 'name' => 'التصميم الإبداعي' ],
            [ 'name' => 'Adobe Illustrator' ],
            [ 'name' => 'تصميم إعلان' ],
            [ 'name' => 'تعديل الصور' ],
            [ 'name' => 'البحث على الإنترنت' ],
            [ 'name' => 'إدخال بيانات' ],
            [ 'name' => 'إنتاج الفيديو' ],
            [ 'name' => 'CSS' ],
            [ 'name' => 'تصميم موقع إلكتروني' ],
            [ 'name' => 'تصميم 3D' ],
            [ 'name' => 'جافا سكريبت' ],
            [ 'name' => 'Laravel' ],
            [ 'name' => 'PHP' ],
            [ 'name' => 'Nodejs' ],
            [ 'name' => 'React' ],
            [ 'name' => 'Vue' ],
        ];

        Tag::insert($tags);
    }
}
