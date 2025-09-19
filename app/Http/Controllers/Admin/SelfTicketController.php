<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\SelfTicketService;
use App\Http\Services\TicketService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class SelfTicketController extends Controller
{
    use ResponseTrait;
    public $ticketService;
    public $allTicketService;

    public function __construct()
    {
        $this->ticketService = new SelfTicketService();
        $this->allTicketService = new TicketService();
    }

    public function selfAssignedTickets(Request $request)
    {
        if ($request->ajax()) {
            return $this->ticketService->list('self-assing-tickets');
        } else {
            $data['pageTitle'] = __('Self Assigned Tickets');
            $data['showMyTicket'] = 'show';
            $data['navSelfAssignedTicketsActiveClass'] = 'active';
            return view('admin.tickets.self_tickets.self-assing-tickets', $data);
        }
    }
    public function myAssignedTickets(Request $request)
    {
        if ($request->ajax()) {
            return $this->allTicketService->list($request,'my-assigned-tickets');

        } else {
            $data['pageTitle'] = __('My Assigned Tickets');
            $data['showMyTicket'] = 'show';
            $data['navMyAssignedTicketsActiveClass'] = 'active';
            return view('admin.tickets.self_tickets.my-assing-tickets', $data);
        }
    }
    public function closedTickets(Request $request)
    {
        if ($request->ajax()) {
            return $this->ticketService->list('closed-tickets');
        } else {
            $data['pageTitle'] = __('Closed Tickets');
            $data['showMyTicket'] = 'show';
            $data['navClosedTicketsActiveClass'] = 'active';
            return view('admin.tickets.self_tickets.colosed-tickets', $data);
        }
    }
    public function suspendTickets(Request $request)
    {
        if ($request->ajax()) {
            return $this->ticketService->list('suspend-tickets');
        } else {
            $data['pageTitle'] = __('Suspend Tickets');
            $data['showMyTicket'] = 'show';
            $data['navSuspendTicketsActiveClass'] = 'active';
            return view('admin.tickets.self_tickets.suspend-tickets', $data);
        }
    }

}
