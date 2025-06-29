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
            <a href="{{route('admin.dashboard')}}">
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
                <div class="menu-title">Politician Management</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.politician.create')}}"><i class='bx bx-radio-circle'></i>Add</a>
                </li>
                <li> <a href="{{route('admin.politician.list')}}"><i class='bx bx-radio-circle'></i>List</a>
                </li>


            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Voter Management</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.voter.create')}}"><i class='bx bx-radio-circle'></i>Add</a>
                </li>
                <li> <a href="{{route('admin.voter.list')}}"><i class='bx bx-radio-circle'></i>List</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">App User Management.</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.app.user.list')}}"><i class='bx bx-radio-circle'></i>App User List</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Master Data Management</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.society.list')}}"><i class='bx bx-radio-circle'></i>Society List</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{route('admin.address.list')}}"><i class='bx bx-radio-circle'></i>Address List</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{route('admin.karyakarta.list')}}"><i class='bx bx-radio-circle'></i>Karyakarta List</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{route('admin.caste.list')}}"><i class='bx bx-radio-circle'></i>Caste List</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{route('admin.position.list')}}"><i class='bx bx-radio-circle'></i>Position List</a>
                </li>
            </ul>

        </li>

    </ul>
    <!--end navigation-->
</div>
