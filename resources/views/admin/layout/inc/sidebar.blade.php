<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>
    <div class="header-right">
        {{-- <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:void(0);" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active">9</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/vendors/images/img.jpg') }} " alt="" />
                                    <h3>John Doe</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/vendors/images/img.jpg') }} " alt="" />
                                    <h3>Lea R. Frith</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/vendors/images/img.jpg') }} " alt="" />
                                    <h3>Erik L. Richards</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/vendors/images/img.jpg') }} " alt="" />
                                    <h3>John Doe</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/vendors/images/img.jpg') }} " alt="" />
                                    <h3>Renee I. Hansen</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/vendors/images/img.jpg') }} " alt="" />
                                    <h3>Vicki M. Coleman</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed...
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('assets/src/img/user.png') }}" alt="" />
                    </span>
                    <span class="user-name">{{ Auth::guard('admin')->user()->first_name." ".Auth::guard('admin')->user()->last_name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="javascript:void(0);">
            <img src="{{ asset('assets/src/img/logo.png') }}" alt="" class="dark-logo" />
            <img src="{{ asset('assets/src/img/logo.png') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <span class="micon flaticon-381-home-2"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/add-new-campaign') || request()->is('admin/campaign-list') || request()->is('admin/campaign-influencer-list') ? 'active' : '' }}">
                        <span class="micon flaticon-381-television"></span><span class="mtext">Campaigns</span>
                    </a>
                    <ul class="submenu submenu1">
                        <li><a class="{{ request()->is('admin/add-new-campaign') ? 'active' : '' }}"
                                href="{{ route('admin.add-new-campaign') }}">Add New Campaigns</a></li>
                        <li><a class="{{ request()->is('admin/campaign-list') ? 'active' : '' }}"
                                href="{{ route('admin.campaign-list') }}">Campaign list</a></li>
                        <li><a class="{{ request()->is('admin/campaign-influencer-list') ? 'active' : '' }}"
                                href="{{ route('admin.campaign-influencer-list') }}">Campaign Influencer</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/report') || request()->is('admin/ledger') ? 'active' : '' }}">
                        <span class="micon flaticon-381-file-2"></span><span class="mtext">Reports</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a class="{{ request()->is('admin/report') ? 'active' : '' }}"
                                href="{{ route('admin.report') }}">Report</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/ledger') ? 'active' : '' }}"
                                href="{{ route('admin.ledger') }}">Ledger</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.influencers') }}" class="dropdown-toggle no-arrow {{ request()->is('admin/influencers') ? 'active' : '' }}">
                        <span class="micon flaticon-381-user-8"></span><span class="mtext">Influencers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.brands') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/brands') ? 'active' : '' }}">
                        <span class="micon flaticon-381-briefcase"></span><span class="mtext">Brands</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.assets-management') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/assets-management') ? 'active' : '' }}">
                        <span class="micon flaticon-381-video-clip"></span><span class="mtext">Asset
                            Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.upload-lead-status') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/upload-lead-status') ? 'active' : '' }}">
                        <span class="micon flaticon-381-cloud-computing"></span><span class="mtext">Upload Lead
                            Status</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/onboarded-list') || request()->is('admin/bulk-upload-onboard-list') || request()->is('admin/activity-history') ? 'active' : '' }}">
                        <img class="micon"
                            src="{{ asset('assets/src/img/sidebar-icons/hover/mdi_leads-outline.svg') }}"
                            alt=""><span class="mtext">Lead Tracking</span>
                    </a>
                    <ul class="submenu submenu3">
                        <li>
                            <a class="{{ request()->is('admin/onboarded-list') ? 'active' : '' }}"
                                href="onboarding-list.php">Onboarded List</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/activity-history') ? 'active' : '' }}"
                                href="activity-history.php">Activity History</a>
                        </li>
                        <li>
                            <a class=" {{ request()->is('admin/bulk-upload-onboard-list') ? 'active' : '' }}"
                                href="{{ route('admin.bulk-upload-onboard-list') }}">Bulk Upload List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.tag') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/tag') ? 'active' : '' }}">
                        <span class="micon flaticon-381-price-tag"></span><span class="mtext">Tag</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.slugs') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/slugs') ? 'active' : '' }}">
                        <span class="micon flaticon-381-database-2"></span><span class="mtext">Slugs</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{ route('admin.bank-details') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/bank-details') ? 'active' : '' }}">
                        <img class="micon" src="{{ asset('assets/src/img/sidebar-icons/hover/landmark.svg') }}"
                            alt="">
                        <span class="mtext">Bank Details</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle">
                        <img class="micon" src="{{ asset('assets/src/img/sidebar-icons/hover/media-library.svg') }}"
                            alt="">
                        <span class="mtext">Media Library</span>
                    </a>
                    <ul class="submenu submenu5">
                        <li><a href="add-media-library.php">Add Media</a></li>
                        <li><a href="draft-media-list.php">Draft Media List</a></li>
                        <li><a href="pending-media-list.php">Pending Media List</a></li>
                        <li><a href="media-list.php">Media List</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle">
                        <img class="micon"
                            src="{{ asset('assets/src/img/sidebar-icons/hover/grommet-icons_document-performance.svg') }}"
                            alt="">
                        <span class="mtext">KPI</span>
                    </a>
                    <ul class="submenu submenu6">
                        <li><a href="influencer-performance-report.php">Influencer KPI Performance</a></li>
                        <li><a href="influencer-transaction-report.php">Transactions</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.enquiry-list') }}"
                        class="dropdown-toggle no-arrow {{ request()->is('admin/enquiry-list') ? 'active' : '' }}">
                        <img class="micon" src="{{ asset('assets/src/img/sidebar-icons/hover/carbon_query.svg') }}"
                            alt="">
                        <span class="mtext">Enquiry</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle {{ request()->is('admin/add-new-member') || request()->is('admin/member-list') || request()->is('admin/role-management') || request()->is('admin/employee-performance') ? 'active' : '' }}">
                        <img class="micon" src="{{ asset('assets/src/img/sidebar-icons/hover/ri_admin-line.svg') }}"
                            alt="">
                        <span class="mtext">Members</span>
                    </a>
                    <ul class="submenu submenu7">
                        <li>
                            <a class="{{ request()->is('admin/add-new-member') ? 'active' : '' }}"
                                href="{{ route('admin.add-new-member') }}">Add Member</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/member-list') ? 'active' : '' }}"
                                href="{{ route('admin.member-list') }}">List Member</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/role-management') ? 'active' : '' }}"
                                href="{{ route('admin.role-management') }}">Role Management</a>
                        </li>
                        <li>
                            <a class="{{ request()->is('admin/employee-performance') ? 'active' : '' }}"
                                href="employee-performance.php">Employee Performance</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login-status.php" class="dropdown-toggle no-arrow">
                        <span class="micon flaticon-381-help-1"></span><span class="mtext">Login Status</span>
                    </a>
                </li>
                <hr class="dashed">
                <li>
                    <a href="{{ route('admin.reset-password') }}" class="dropdown-toggle no-arrow {{ request()->is('admin/reset-password') ? 'active' : '' }}">
                        <img class="micon"
                            src="{{ asset('assets/src/img/sidebar-icons/hover/ic_outline-lock-reset1.svg') }}"
                            alt="">
                        <span class="mtext">Reset Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}" class="dropdown-toggle no-arrow">
                        <span class="micon flaticon-381-exit-2"></span><span class="mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
