<?php

namespace App\Http\Controllers\v1;

use App\ValueObjects\Money;
use Illuminate\Http\Request;
use App\ValueObjects\Currency;
use App\Services\PaynowService;
use App\Http\Controllers\Controller;
use App\ValueObjects\OneMoneyNumber;
use App\Commands\ChargeCustomerCommand;
use App\Http\Requests\Rules\ValidOnemoneyNumber;

class ChargeCustomerController extends Controller {

    /**
     * The PaynowService instance
     *
     * @var [type]
     */
    private $paynowService;

    /**
     * Create a new controller instance
     *
     * @param PaynowService $paynowService
     */
    public function __construct(PaynowService $paynowService) {
        $this->paynowService = $paynowService;
    }

    /**
     * Charge a customer
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request){
        $validated = $this->validate($request, [
            'amount' => ['required'],
            'reason' => ['nullable', 'max:160'],
            'result_url' => ['nullable', 'url'],
            'customer_email' => ['nullable', 'email'],
            'customer_number' => ['required', new ValidOnemoneyNumber],
        ]);

        $amount = new Money($validated['amount'], Currency::RTGS());
        $number = new OneMoneyNumber($validated['customer_number']);

        $command = new ChargeCustomerCommand($number, $amount);
        $command->reason = $validated['reason'] ?? null;
        $command->resultUrl = $validated['result_url'] ?? null;
        $command->customerEmail = $validated['customer_email'] ?? null;

        $payment = $this->paynowService->chargeCustomer($command);

        return response()->json([
            'id' =>$payment->id,
            'status' => $payment->status,
            'method' => $payment->method,
            'poll_url' => $payment->pollUrl
        ], 201);
    }
}
