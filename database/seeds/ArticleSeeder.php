<?php

use Illuminate\Database\Seeder;
use App\ArticleCategory;
use App\Article;
use App\ArticleCategoryRelation;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->truncate();
        DB::table('articles')->truncate();
        DB::table('article_category_relations')->truncate();
        $numberCat = 3;
        $numberArticle = 5;
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= $numberCat; $i++) {
            $a = ArticleCategory::create([
                'name' => "Danh Muc $i",
                'active' => 1,
            ]);
            for ($j = 1; $j < $numberArticle; $j++) {
                $b = Article::create([
                    'name' => $faker->title,
                    'active' => 1,
                    'image' => '/htmlcss/img/minion.jpg',
                    'content' => $faker->sentences(10, 1),
                    'excerpt' => $faker->sentence(15, 1)
                ]);
                ArticleCategoryRelation::create([
                    'article_id' => $b->id,
                    'article_category_id' => $a->id
                ]);
            }
        }
    }
}
