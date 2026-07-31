<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 20 data barang dummy
        Item::factory()->count(10)->create();
        Item::factory(10)->bahan()->create();
    }
}
