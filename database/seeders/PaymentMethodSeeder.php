<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::create(['name' => 'Tarjeta de Crédito', 'details' => 'Visa, Mastercard, American Express']);
        PaymentMethod::create(['name' => 'PayPal', 'details' => 'Pago a través de PayPal']);
        PaymentMethod::create(['name' => 'Transferencia Bancaria', 'details' => 'Transferencia directa a la cuenta bancaria']);
    }
}
