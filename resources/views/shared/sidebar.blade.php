<nav id="sidebar">
    <div class="p-4 pt-5">
        <a href="#" class="img logo rounded-circle mb-5"
            style="background-image: url({{ asset('/img/logo.jpg') }});"></a>
        <p class='text-center'>Welcome {{ Auth::user()->name }}</p>
        <ul class="list-unstyled components mb-5">
            <li><a id="menu-dashboard" href="{{url('dashboard')}}">{{ __('Dashboard')}}</a></li>
            <li><a id="menu-subject" href="{{url('subject')}}">{{ __('Subject')}}</a></li>
            <li><a id="menu-education-level" href="{{url('education_level')}}">{{ __('Education Level')}}</a></li>
            <li><a id="menu-classroom" href="{{url('classroom')}}">{{ __('Classroom')}}</a></li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </li>
        </ul>
    </div>
</nav>