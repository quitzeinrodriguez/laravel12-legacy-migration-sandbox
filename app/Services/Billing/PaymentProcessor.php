<?php

namespace App\Services\Billing;

use App\Contracts\PaymentGatewayInterface;
use App\Events\PaymentProcessedSuccessfully;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class PaymentProcessor
{
    // Inversión de dependencias para desacoplar la pasarela externa
    public function __construct(
        private PaymentGatewayInterface $gateway
    ) {}

    public function execute(User $user, int $amountInCents): Invoice
    {
        // El uso de transacciones asegura la integridad de los datos
        return DB::transaction(function () use ($user, $amountInCents) {
            
            // 1. Cargo a través de la interfaz abstraída
            $chargeId = $this->gateway->charge($user, $amountInCents);

            // 2. Creación del registro mediante Eloquent
            $invoice = Invoice::create([
                'user_id' => $user->id,
                'amount' => $amountInCents,
                'gateway_charge_id' => $chargeId,
            ]);

            // 3. Evento asíncrono (Se procesa en background vía Laravel Queues)
            // Esto evita que el usuario espere a que se envíe el email
            event(new PaymentProcessedSuccessfully($invoice));

            return $invoice;
        });
    }
}
