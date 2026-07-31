<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $items = [
            'Laptop Lenovo Thinkpad',
            'Mouse Logitech Wireless',
            'Keyboard Mechanical',
            'Monitor Dell 24 Inch',
            'Kabel HDMI 5m',
            'Proyektor Epson',
            'Router Mikrotik RB750',
            'Switch Hub TP-Link 8 Port',
            'PC Rakitan Core i5'
        ];

        return [
            'code' => fake()->unique()->bothify('INV-####'),
            'name' => fake()->randomElement($items),
            'description' => fake()->sentence(6),
            'stock' => fake()->numberBetween(5, 50),
            'type' => 'barang', // Default ke barang
            'jenis_lab' => fake()->randomElement(['Lab Komputer', 'Lab Jaringan', 'Lab Multimedia']),
            'location' => fake()->bothify('Rak ?-##'),
        ];
    }

    /**
     * State khusus untuk Bahan (Consumables)
     */
    public function bahan(): static
    {
        $materials = [
            'Timah Solder',
            'Pasta Thermal',
            'Kabel UTP Cat6 (Meter)',
            'RJ45 Connector',
            'Baterai CMOS',
            'Isolasi Listrik',
            'Kertas A4',
            'Tinta Printer Black',
            'Cleaning Kit Laptop'
        ];

        return $this->state(fn(array $attributes) => [
            'code' => fake()->unique()->bothify('MAT-####'), // MAT untuk Material
            'name' => fake()->randomElement($materials),
            'type' => 'bahan',
            'stock' => fake()->numberBetween(20, 100), // Bahan biasanya stoknya lebih banyak
            'jenis_lab' => 'Gudang Bahan',
        ]);
    }
}
