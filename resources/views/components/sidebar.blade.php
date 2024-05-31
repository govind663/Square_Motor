<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="{{ $currentRoute === 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'insurance_company.index') || ($currentRoute === 'insurance_company.create') || ($currentRoute === 'insurance_company.edit') ? 'active' : '' }}">
                    <a href="{{ route('insurance_company.index') }}">
                        <i class="fe fe-file-plus"></i>
                        <span>Manage Insurance Company</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'insurance_company_id.index') || ($currentRoute === 'insurance_company_id.create') || ($currentRoute === 'insurance_company_id.edit') ? 'active' : '' }}">
                    <a href="{{ route('insurance_company_id.index') }}">
                        <i class="fe fe-clipboard"></i>
                        <span>Manage Insurance Company IDs</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'agent.index') || ($currentRoute === 'agent.create') || ($currentRoute === 'agent.edit') ? 'active' : '' }}">
                    <a href="{{ route('agent.index') }}">
                        <i class="fe fe-users"></i>
                        <span>Manage Agents</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'vehicle.index') || ($currentRoute === 'vehicle.create') || ($currentRoute === 'vehicle.edit') ? 'active' : '' }}">
                    <a href="{{ route('vehicle.index') }}">
                        <i class="fe fe-grid"></i>
                        <span>Manage Vehicle</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'agent_commission.index') || ($currentRoute === 'agent_commission.create') || ($currentRoute === 'agent_commission.edit') ? 'active' : '' }}">
                    <a href="{{ route('agent_commission.index') }}">
                        <i class="fe fe-user"></i>
                        <span>Manage Commission</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'retailer.index') || ($currentRoute === 'retailer.create') || ($currentRoute === 'retailer.edit') ? 'active' : '' }}">
                    <a href="{{ route('retailer.index') }}">
                        <i class="fe fe-user-plus"></i>
                        <span>Manage Customer</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'employee.index') || ($currentRoute === 'employee.create') || ($currentRoute === 'employee.edit') ? 'active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="fe fe-user-check"></i>
                        <span>Manage Employee</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'rto.index') || ($currentRoute === 'rto.create') || ($currentRoute === 'rto.edit') ? 'active' : '' }}">
                    <a href="{{ route('rto.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage RTO</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'policy.index') || ($currentRoute === 'policy.create') || ($currentRoute === 'policy.edit') ? 'active' : '' }}">
                    <a href="{{ route('policy.index') }}">
                        <i class="fe fe-file"></i>
                        <span>Manage Polices</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'report.index') || ($currentRoute === 'serch.policy.list') ? 'active' : '' }}">
                    <a href="{{ route('report.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Report</span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="fe fe-credit-card"></i>
                        <span>Finance</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li class="menu-arrow {{ ($currentRoute === 'payment.index') || ($currentRoute === 'payment.create') || ($currentRoute === 'payment.edit') ? 'active' : '' }}">
                            <a href="{{ route('payment.index') }}"><span>Payment to Agent</span></a>
                        </li>
                        <li class="menu-arrow {{ ($currentRoute === 'payment_to_company.index') || ($currentRoute === 'payment_to_company.create') || ($currentRoute === 'payment_to_company.edit') ? 'active' : '' }}">
                            <a href="{{ route('payment_to_company.index') }}"><span>Payment to Company</span></a>
                        </li>
                        <li class="{{ ($currentRoute === 'agent_to_company.index') ? 'active' : '' }}">
                            <a href="{{ route('agent_to_company.index') }}"><span>Agent Leadger</span></a>
                        </li>
                        <li class="{{ ($currentRoute === 'retailer_to_company.index') ? 'active' : '' }}">
                            <a href="{{ route('retailer_to_company.index') }}"><span>Direct Customer</span></a>
                        </li>
                        <li>
                            <a href="#"><span>Company Leadger</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fe fe-file-text"></i>
                        <span>Download Section</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'expenses.index') || ($currentRoute === 'expenses.create') || ($currentRoute === 'expenses.edit') ? 'active' : '' }}">
                    <a href="{{ route('expenses.index') }}">
                        <i class="fe fe-package"></i>
                        <span>Manage Expenses</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
