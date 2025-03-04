<?php 
namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createPayment($id)
    {
        $cuota = Cuota::find($id);
        // Instanciar PayPal
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $token = $paypal->getAccessToken();
        $paypal->setAccessToken($token);

        // Configurar orden de pago
        $order = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $cuota->importe_EUR   // Monto de la cuota
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel')
            ]
        ];

        // Crear orden en PayPal
        $response = $paypal->createOrder($order);

        // Redirigir al usuario a PayPal
        if (isset($response['id'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        

        return redirect()->route('paypal.cancel');
    }

    public function successPayment(Request $request)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $token = $paypal->getAccessToken();
        $paypal->setAccessToken($token);

        // Capturar el pago
        $response = $paypal->capturePaymentOrder($request->query('token'));

        // Verificar si el pago fue exitoso
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return "Pago realizado con éxito";
        }

        return "El pago no se pudo completar";
    }

    public function cancelPayment()
    {
        return "El pago fue cancelado por el usuario.";
    }
}
