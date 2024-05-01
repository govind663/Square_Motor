<style>
    .sidebar .sidebar-menu ul li a {
        padding: 10px 23px;
        position: relative;
        color: #3f4254;
        font-size: 20px !important;
    }
</style>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="active <?= $page_title == 'dashboard'?' active':''; ?>">
                    <a href="{{ route('home') }}">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'agent_list'?' active':''; ?>">
                    <a href="{{ route('agent.index') }}">
                        <i class="fe fe-users"></i>
                        <span>Manage Agents</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'vehicle_list'?' active':''; ?>">
                    <a href="{{ route('vehicle.index') }}">
                        <i class="fe fe-grid"></i>
                        <span>Manage Vehicle</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'retailer_list'?' active':''; ?>">
                    <a href="{{ route('retailer.index') }}">
                        <i class="fe fe-user-plus"></i>
                        <span>Manage Retailer</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'rto_list'?' active':''; ?>">
                    <a href="{{ route('rto.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage RTO</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'employee_list'?' active':''; ?>">
                    <a href="{{ route('employee.index') }}">
                        <i class="fe fe-user-check"></i>
                        <span>Manage Employee</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'insurance_company_list'?' active':''; ?>">
                    <a href="{{ route('insurance_company.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage Insurance Company</span>
                    </a>
                </li>

                <li class="active <?= $page_title == 'policy_list'?' active':''; ?>">
                    <a href="{{ route('policy.index') }}">
                        <i class="fe fe-file"></i>
                        <span>Manage Polices</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
