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
                        <a href="{{ route('admin.profile_' . session('locale')) }}" class="dropdown-item">
                            <i class="ti-user"></i> @lang('Profile')
                        </a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti-power-off"></i> @lang('Log out')
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
                            @lang('Home')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.settings_' . session('locale')) }}"
                        aria-expanded="false">
                        <i class="icons-Gears"></i>
                        <span class="hide-menu">
                            @lang('Settings')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.contact_' . session('locale')) }}"
                        aria-expanded="false">
                        <i class="icons-Phone-2"></i>
                        <span class="hide-menu">
                            @lang('Contact')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.about_' . session('locale')) }}"
                        aria-expanded="false">
                        <i class="ti-info-alt"></i>
                        <span class="hide-menu">
                            @lang('About')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.categories.index_' . session('locale')) }}"
                        aria-expanded="false">
                        <i class="ti-folder"></i>
                        <span class="hide-menu">
                            @lang('Categories')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-briefcase"></i><span class="hide-menu">
                            @lang('Services')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.services.index_' . session('locale')) }}">
                                @lang('Services')
                            </a>
                            <a href="{{ route('admin.services.create_' . session('locale')) }}">
                                @lang('New service')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i><span class="hide-menu">
                            @lang('Users')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.users.index_' . session('locale')) }}">
                                @lang('Users')
                            </a>
                            <a href="{{ route('admin.users.create_' . session('locale')) }}">
                                @lang('New user')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-people"></i><span class="hide-menu">
                            @lang('Team')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.team.index_' . session('locale')) }}">
                                @lang('Team')
                            </a>
                            <a href="{{ route('admin.team.create_' . session('locale')) }}">
                                @lang('New member')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-star"></i><span class="hide-menu">
                            @lang('Qualities')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.qualities.index_' . session('locale')) }}">
                                @lang('Qualities')
                            </a>
                            <a href="{{ route('admin.qualities.create_' . session('locale')) }}">
                                @lang('New quality')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="ti-gallery"></i><span class="hide-menu">
                            @lang('Slider')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.slider.index_' . session('locale')) }}">
                                @lang('Slider')
                            </a>
                            <a href="{{ route('admin.slider.create_' . session('locale')) }}">
                                @lang('New slide')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-file-multiple"></i><span class="hide-menu">
                            @lang('Blog')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.blog.index_' . session('locale')) }}">
                                @lang('Blog')
                            </a>
                            <a href="{{ route('admin.blog.create_' . session('locale')) }}">
                                @lang('New article')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-comment-question-outline"></i><span class="hide-menu">
                            @lang('Who we are')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.whyus.index_' . session('locale')) }}">
                                @lang('Who we are')
                            </a>
                            <a href="{{ route('admin.whyus.create_' . session('locale')) }}">
                                @lang('New advantage')
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.clients.index_' . session('locale')) }}"
                        aria-expanded="false">
                        <i class="mdi mdi-account-card-details"></i>
                        <span class="hide-menu">
                            @lang('Clients')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.skills.index_' . session('locale')) }}"
                        aria-expanded="false">
                        <i class="mdi mdi-chart-bar"></i>
                        <span class="hide-menu">
                            @lang('Skills')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark"
                        href="{{ route('admin.messages.index_' . session('locale')) }}" aria-expanded="false">
                        <i class="ti-email"></i>
                        <span class="hide-menu">
                            @lang('Messages')
                        </span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-school"></i><span class="hide-menu">
                            @lang('Courses')
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('admin.courses.index_' . session('locale')) }}">
                                @lang('Courses')
                            </a>
                            <a href="{{ route('admin.courses.create_' . session('locale')) }}">
                                @lang('New course')
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
