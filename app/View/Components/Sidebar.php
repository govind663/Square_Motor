<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $page_title['dashboard'] = 'dashboard';
        $page_title['agent_list'] = 'agent_list';
        $page_title['vehicle_list'] = 'vehicle_list';
        $page_title['retailer_list'] = 'retailer_list';
        $page_title['rto_list'] = 'rto_list';
        $page_title['employee_list'] = 'employee_list';
        $page_title['insurance_company_list'] = 'insurance_company_list';
        $page_title['policy_list'] = 'policy_list';

        return view('components.sidebar', ['page_title'=> $page_title]);
    }
}
