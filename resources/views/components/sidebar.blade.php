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

                <li class="{{ ($currentRoute === 'retailer.index') || ($currentRoute === 'retailer.create') || ($currentRoute === 'retailer.edit') ? 'active' : '' }}">
                    <a href="{{ route('retailer.index') }}">
                        <i class="fe fe-user-plus"></i>
                        <span>Manage Retailer</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'rto.index') || ($currentRoute === 'rto.create') || ($currentRoute === 'rto.edit') ? 'active' : '' }}">
                    <a href="{{ route('rto.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage RTO</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'employee.index') || ($currentRoute === 'employee.create') || ($currentRoute === 'employee.edit') ? 'active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="fe fe-user-check"></i>
                        <span>Manage Employee</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'insurance_company.index') || ($currentRoute === 'insurance_company.create') || ($currentRoute === 'insurance_company.edit') ? 'active' : '' }}">
                    <a href="{{ route('insurance_company.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage Insurance Company</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'policy.index') || ($currentRoute === 'policy.create') || ($currentRoute === 'policy.edit') ? 'active' : '' }}">
                    <a href="{{ route('policy.index') }}">
                        <i class="fe fe-file"></i>
                        <span>Manage Polices</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'report.index') || ($currentRoute === 'serch.policy.list') || ($currentRoute === 'policy.edit') ? 'active' : '' }}">
                    <a href="{{ route('report.index') }}">
                        <i class="fe fe-clipboard"></i>
                        <span>Report</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fe fe-credit-card"></i>
                        <span>Finance</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fe fe-file-text"></i>
                        <span>Download Section</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
