<?php

namespace App\Http\Controllers;

use App\Models\PurchasedTicket;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

public function purchaseTickets(Request $request)
{
    $messages = [
        'tickets.required' => 'At least one ticket must be selected',
        'quantities.adult.min' => 'Quantity for Adult ticket must be at least 1',
        'quantities.kids.min' => 'Quantity for Kids ticket must be at least 1',
        'quantities.educators.min' => 'Quantity for Educators ticket must be at least 1',
    ];

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phoneNumber' => 'required|string|max:20',
        'date' => 'required|date',
    ], $messages);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->with('openModal', true)
            ->withErrors($validator)
            ->withInput();
    }

    $selectedTickets = $request->input('tickets');

    if (empty($selectedTickets) || !is_array($selectedTickets)) {
        return redirect()
            ->back()
            ->with('openModal', true)
            ->withErrors(['tickets' => 'At least one ticket must be selected'])
            ->withInput();
    }

    $selectedTickets = array_filter($selectedTickets);

    if (empty($selectedTickets)) {
        return redirect()
            ->back()
            ->with('openModal', true)
            ->withErrors(['tickets' => 'At least one ticket quantity must be provided'])
            ->withInput();
    }

    foreach ($selectedTickets as $key => $value) {
        $quantity = $request->input("quantities.$key");
        if ($quantity < 1) {
            return redirect()
                ->back()
                ->with('openModal', true)
                ->withErrors(['tickets' => "Quantity for $key ticket must be at least 1"])
                ->withInput();
        }
    }

    if (now() > $request->input('date')) {
        return redirect()
            ->back()
            ->with('openModal', true)
            ->withErrors(['date' => 'The selected date must be in the future'])
            ->withInput();
    }

    $date = Carbon::parse($request->input('date'));
    if ($date->dayOfWeek == Carbon::MONDAY) {
        return redirect()
            ->back()
            ->with('openModal', true)
            ->withErrors(['date' => 'Selected date must not be Monday'])
            ->withInput();
    }

    $tickets = Ticket::all()->pluck('price', 'type')->toArray();
    $chosenTickets = [];
    $totalTickets = 0;
    $summaryPrice = 0;

    $customer = new User();
    $customer->name = $request->input('name');
    $customer->email = $request->input('email');
    $customer->phone_number = $request->input('phoneNumber');
    $customer->save();

    foreach ($request->input('tickets') as $ticketType => $isTicketChosen) {
        if ($isTicketChosen) {
            $ticketQuantity = $request->input("quantities.$ticketType");

            $chosenTickets[] = [
                'ticket_type' => $ticketType,
                $ticketType . '_quantity' => $ticketQuantity
            ];

            $totalTickets += $ticketQuantity;
            $summaryPrice += $ticketQuantity * $tickets[$ticketType];
        }
    }

    $purchasedTickets = new PurchasedTicket();
    $purchasedTickets->user_id = $customer->id;
    $purchasedTickets->ticket_options = json_encode($chosenTickets);
    $purchasedTickets->summary_price = $summaryPrice;

    $purchasedTickets->save();

    return redirect()->back()
        ->with([
            'openModal' => false,
            'success' => 'The purchase has been made successfully!'
        ]);
    }
}
