<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\Categories;

use Faker\Factory as Faker;

use Carbon\Carbon;

trait varSet {
    public static $user;
    public static $category;
    public static $post;
    public static $curr_timestamp;
    public static $fake_datas;
}

$category=1;

class DatabaseSeeder extends Seeder
{
    use varSet;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function __construct(){
        varSet::$curr_timestamp = Carbon::now()->timestamp;
        varSet::$fake_datas=Faker::create();
    }
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->command->warn('Remember Each time you seed, a couple of user,post and comment is automatically created');
        $this->call([Users_table_seeder::class,Categories_table_seeder::class,Post_table_seeder::class,Comment_table_seeder::class]);
 
        $this->command->info('Dummy datas has been inserted successfully');
        $this->command->info("Please login using ".varSet::$user->email." & 12345678 as password");
    }
}

class Users_table_seeder extends Seeder
{
    use varSet;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        varSet::$user = User::create([
            'email'=>varSet::$fake_datas->email(),
            'name'=>varSet::$fake_datas->name(),
            'password'=>Hash::make('12345678')
        ]);
    }
}
class Categories_table_seeder extends Seeder{
    public function run(){
        varSet::$category = Categories::create([
            'name' => "Dummy posts",
            'details' => "Posts with mock datas"
        ]);
    }
}
class Post_table_seeder extends Seeder
{
    use varSet;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        varSet::$post = Posts::create([
            'title' => varSet::$fake_datas->name(),
            'caption' => varSet::$fake_datas->text(),
            'content' => varSet::$fake_datas->paragraph(4),
            'image_url' => "https://www.maxitendance.com/wp-content/uploads/2021/09/doodle-ipsum-lorem-ipsum-illustration-01.jpg",
            'category' => varSet::$category->id,
            'user_id' => varSet::$user->id,
            'created_at' => varSet::$curr_timestamp,
            'updated_at' => varSet::$curr_timestamp
        ]);
    }
}


class Comment_table_seeder extends Seeder
{
    use varSet;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::create([
            'comment' => varSet::$fake_datas->text(),
            'user_id' => varSet::$user->id,
            'post_id' => varSet::$post->id,
            'created_at' => varSet::$curr_timestamp,
            'updated_at' => varSet::$curr_timestamp
        ]);
    }
}