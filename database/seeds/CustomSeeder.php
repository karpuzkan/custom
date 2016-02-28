<?php

use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $y = 1;
    public $x = 1;
    public $z = 1;

    public function run()
    {
        // Menu Table Seeder
        factory(App\Menu::class, 5)->create();

        // User Table Seeder
        factory(App\User::class, 5)->create();;

        // Comment Table Seeder
        factory(App\Comment::class, 10)->create();

        // Subscribes Table Seeder
        factory(App\Subscribe::class, 20)->create();

        // Company Table Seeder
        factory(App\Company::class, 5)->create()->each(function($u){
            $u->accountancy()->sync(factory(App\Accountancy::class, 5)->create()->each(function($u) {
                \File::makeDirectory(storage_path('app/accountancy/'.$u->id), 0775, true, true);
            }));
        });


        // Content Table Seeder
        // banners
        factory(App\Content::class, 5)->create(['type'=>'Banners'])->each(function($u){
            for ($i=0;$i<3;$i++) {
                $faker = Faker\Factory::create();
                $title = $faker->colorName;
                $slug = '/img/photos/'.$this->y.'/'.str_slug($title).'.jpg';
                $u->photos()->save(factory(App\Photos::class)->make(['title'=>$title,'slug'=>$slug, 'alt_tag'=>'alt tag is important for SEO']));
                $this->y++;
            }
        });
        // galleries
        factory(App\Content::class, 5)->create(['type'=>'Galleries'])->each(function($u){
            for ($i=0;$i<3;$i++) {
                $faker = Faker\Factory::create();
                $title = $faker->colorName;
                $slug = '/img/photos/'.$this->y.'/'.str_slug($title).'.jpg';
                $u->photos()->save(factory(App\Photos::class)->make(['title'=>$title,'slug'=>$slug, 'alt_tag'=>'alt tag is important for SEO']));
                $this->y++;
            }
        });

        // links
        factory(App\Content::class, 5)->create(['type'=>'Links'])->each(function($u){
            for ($i=0;$i<5;$i++) {
                $faker = Faker\Factory::create();
                $title = $faker->citySuffix;
                $slug = str_slug($title);
                $pdf  = '/pdf/'.$this->x.'/'.str_slug($title).'.pdf';
                $u->links()->save(factory(App\Links::class)->make(['title'=>$title, 'slug'=>$slug,'pdf'=>$pdf ]));
                $this->x++;
            }
        });

        // people
        factory(App\Content::class, 5)->create(['type'=>'People'])->each(function($u){
            for ($i=0;$i<5;$i++){
                $u->people()->save(factory(App\Person::class)->make());
                $this->z++;
            }
        });

        // seed photos
        foreach (App\Photos::all() as $img) {
            $storagepath = storage_path('app').'/img/photos/'.$img->id;
            !file_exists($storagepath)?mkdir($storagepath,0777,true):null;
            copy(storage_path('app').'/img/assets/dummy.jpg',storage_path('app').$img->slug);
        }
        // seed pdf
        foreach (App\Links::all() as $link) {
            $storagepath = storage_path('app/pdf/').$link->id;
            !file_exists($storagepath)?mkdir($storagepath,0777,true):null;
            copy(storage_path('app/img/assets/dummy.pdf'),storage_path('app').$link->pdf);
        }
        // seed pdf
        foreach (App\Accountancy::all() as $acc) {
            $faker = Faker\Factory::create();

            $storagepath = storage_path('app/accountancy/').$acc->id;
            !file_exists($storagepath)?mkdir($storagepath,0777,true):null;
            copy(storage_path('app/img/assets/dummy.pdf'),storage_path('app/accountancy/').$acc->id.'/'.$faker->userName.'.pdf');
            copy(storage_path('app/img/assets/dummy.jpg'),storage_path('app/accountancy/').$acc->id.'/'.$faker->name.'.png');
            copy(storage_path('app/img/assets/dummy.xls'),storage_path('app/accountancy/').$acc->id.'/'.$faker->userName.'.xls');
        }
    }
}
