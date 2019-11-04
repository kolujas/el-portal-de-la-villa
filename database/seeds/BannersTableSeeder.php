<?php
    use App\Models\Banner;
    use Illuminate\Database\Seeder;

    class BannersTableSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $banner = Banner::find(1);
            $banner->update([
                'imagen' => 'banner/1.jpg',
            ]);
            $banner = Banner::find(2);
            $banner->update([
                'imagen' => 'banner/2.png',
            ]);
            $banner = Banner::find(3);
            $banner->update([
                'imagen' => 'banner/3.jpg',
            ]);
        }
    }