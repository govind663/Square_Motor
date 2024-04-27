<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('home') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="#"><i data-feather="grid"></i> <span> Master</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chat.html">Chat</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="customers.html"><i data-feather="users"></i> <span>Customers</span></a>
                </li>
                <li>
                    <a href="estimates.html"><i data-feather="file-text"></i> <span>Estimates</span></a>
                </li>
                <li>
                    <a href="invoices.html"><i data-feather="clipboard"></i> <span>Invoices</span></a>
                </li>
                <li>
                    <a href="payments.html"><i data-feather="credit-card"></i> <span>Payments</span></a>
                </li>
                <li>
                    <a href="expenses.html"><i data-feather="package"></i> <span>Expenses</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="pie-chart"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="sales-report.html">Sales Report</a></li>
                        <li><a href="expenses-report.html">Expenses Report</a></li>
                        <li><a href="profit-loss-report.html">Profit & Loss Report</a></li>
                        <li><a href="taxs-report.html">Taxs Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings.html"><i data-feather="settings"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="grid"></i> <span> Application</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="inbox.html">Email</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li>
                    <a href="profile.html"><i data-feather="user-plus"></i> <span>Profile</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="lock"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="alert-octagon"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li>
                    <a href="users.html"><i data-feather="user"></i> <span>Users</span></a>
                </li>
                <li>
                    <a href="blank-page.html"><i data-feather="file"></i> <span>Blank Page</span></a>
                </li>
                <li>
                    <a href="maps-vector.html"><i data-feather="map-pin"></i> <span>Vector Maps</span></a>
                </li>
                <li class="menu-title">
                    <span>UI Interface</span>
                </li>
                <li>
                    <a href="components.html"><i data-feather="layers"></i> <span>Components</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="sweetalerts.html">Sweet Alerts</a></li>
                        <li><a href="tooltip.html">Tooltip</a></li>
                        <li><a href="popover.html">Popover</a></li>
                        <li><a href="ribbon.html">Ribbon</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="drag-drop.html">Drag & Drop</a></li>
                        <li><a href="rangeslider.html">Range Slider</a></li>
                        <li><a href="rating.html">Rating</a></li>
                        <li><a href="toastr.html">Toastr</a></li>
                        <li><a href="text-editor.html">Text Editor</a></li>
                        <li><a href="counter.html">Counter</a></li>
                        <li><a href="scrollbar.html">Scrollbar</a></li>
                        <li><a href="spinner.html">Spinner</a></li>
                        <li><a href="notification.html">Notification</a></li>
                        <li><a href="lightbox.html">Lightbox</a></li>
                        <li><a href="stickynote.html">Sticky Note</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-js.html">Chart Js</a></li>
                        <li><a href="chart-morris.html">Morris Charts</a></li>
                        <li><a href="chart-flot.html">Flot Charts</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                        <li><a href="chart-c3.html">C3 Charts</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="award"></i> <span> Icons </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-feather.html">Feather Icons</a></li>
                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="columns"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html">Form Mask </a></li>
                        <li><a href="form-validation.html">Form Validation </a></li>
                        <li><a href="form-select2.html">Form Select2 </a></li>
                        <li><a href="form-fileupload.html">File Upload </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i data-feather="layout"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
