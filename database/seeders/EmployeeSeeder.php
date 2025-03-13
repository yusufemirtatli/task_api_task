<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => 'Ali Yılmaz', 'email' => 'ali.yilmaz@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ayşe Demir', 'email' => 'ayse.demir@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mehmet Kaya', 'email' => 'mehmet.kaya@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Zeynep Çelik', 'email' => 'zeynep.celik@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fatma Şahin', 'email' => 'fatma.sahin@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ahmet Özkan', 'email' => 'ahmet.ozkan@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elif Arslan', 'email' => 'elif.arslan@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mustafa Aydın', 'email' => 'mustafa.aydin@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hülya Koç', 'email' => 'hulya.koc@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Emre Güneş', 'email' => 'emre.gunes@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
