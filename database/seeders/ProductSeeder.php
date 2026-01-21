<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => '1 ТБ Внешний HDD Toshiba Canvio Basics [HDTB510EK3AA]',
                'description' => '1 ТБ Внешний HDD Toshiba Canvio Basics [HDTB510EK3AA] [2.5", 5400 rpm, USB 3.2 Gen 1 Type-A, черный]',
                'price' => 6299,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '4 ТБ Внешний HDD Seagate Expansion [STKM4000400]',
                'description' => '4 ТБ Внешний HDD Seagate Expansion [STKM4000400] [2.5", USB 3.2 Gen 1 Type-A, черный]',
                'price' => 14799,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '2 ТБ Внешний HDD WD My Passport [WDBYVG0020BBK-CESN]',
                'description' => '2 ТБ Внешний HDD WD My Passport [WDBYVG0020BBK-CESN] [2.5", USB 3.2 Gen 1 Type-A, черный]',
                'price' => 9799,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '27" Монитор MSI PRO MP273A черный 5099137',
                'description' => '27" Монитор MSI PRO MP273A черный 5099137 27" Монитор MSI PRO MP273A черный [1920x1080@100 Гц, IPS, LED, 1000:1, 300 Кд/м², 178°/178°, DisplayPort 1.2a, HDMI 1.4b, VGA (D-Sub), Adaptive-Sync]',
                'price' => 13199,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '27" Монитор Xiaomi G27i черный',
                'description' => '27" Монитор Xiaomi G27i черный [1920x1080@165 Гц, IPS, LED, 1000:1, 250 Кд/м², 178°/178°, DisplayPort 1.2, HDMI 2.0, AMD FreeSync Premium]',
                'price' => 12144,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Клавиатура проводная Logitech K120',
                'description' => 'Клавиатура проводная Logitech K120 [мембранная, клавиш - 104, USB Type-A, цвет черный]',
                'price' => 1199,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Клавиатура проводная AJAZZ AK820',
                'description' => 'Клавиатура проводная AJAZZ AK820 [механическая, Ajazz AS 001 Red Switch, клавиш - 82, USB Type-A, цвет серый]',
                'price' => 3199,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Клавиатура проводная Red Square Keyrox TKL Aquarius',
                'description' => 'Клавиатура проводная Red Square Keyrox TKL Aquarius [механическая, g3ms Amber, клавиш - 87, USB Type-A, цвет белый]',
                'price' => 3999,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Клавиатура проводная ARDOR GAMING Blade',
                'description' => 'Клавиатура проводная ARDOR GAMING Blade [механическая, Gateron Brown, клавиш - 104, USB Type-A, цвет черный]',
                'price' => 4899,
                'category_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Мышь проводная Logitech B100 [910-006605] черный',
                'description' => 'Мышь проводная Logitech B100 [910-006605] черный [1000 dpi, светодиодный, USB Type-A, кнопки - 3]',
                'price' => 500,
                'category_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
