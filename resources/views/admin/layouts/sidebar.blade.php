@php use Illuminate\Support\Facades\Auth; @endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                       data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="{{--{{ route('admin.profile.index') }}--}}" class="dropdown-item">
                            <i class="ti-user"></i> {{ __('Profile')}}
                        </a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti-power-off"></i> {{ __('Log out')}}
                            </button>
                        </form>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="icon-speedometer"></i>
                        <span class="hide-menu">
                            {{ __('Home') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.settings_' . session('locale')) }}"
                       aria-expanded="false">
                        <i class="icons-Gears"></i>
                        <span class="hide-menu">
                            {{ __('Settings') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.contact_' . session('locale')) }}"
                       aria-expanded="false">
                        <i class="icons-Phone-2"></i>
                        <span class="hide-menu">
                            {{ __('Contact') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.about_' . session('locale')) }}"
                       aria-expanded="false">
                        <i class="ti-info-alt"></i>
                        <span class="hide-menu">
                            {{ __('About') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.categories.index_' . session('locale')) }}"
                       aria-expanded="false">
                        <i class="ti-folder"></i>
                        <span class="hide-menu">
                            {{ __('Categories') }}
                        </span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-briefcase"></i><span class="hide-menu">
                            {{ __('Services') }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="javascript:void(0)">
                                {{ __('Services') }}
                            </a>
                            <a href="javascript:void(0)">
                                {{ __('New service') }}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
