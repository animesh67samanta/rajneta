<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div>
            <img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div> --}}
        <div>
            <h4 class="logo-text">Rajneta Admin Panel</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('politician.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title ">Dashboard</div>
            </a>

        </li>
        {{-- <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Widgets</div>
            </a>
        </li> --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Staff Management</div>
            </a>
            <ul>
                <li> <a href="{{route('politician.staff.create')}}"><i class='bx bx-radio-circle'></i>Staff Add</a>
                </li>
                <li> <a href="{{route('politician.staff.list')}}"><i class='bx bx-radio-circle'></i>Staff List</a>
                </li>
               
             

                {{-- <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
                </li>
                <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
                </li>
                <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
                </li>
                <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
                </li> --}}
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
