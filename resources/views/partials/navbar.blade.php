<div class="rounded-lg shadow bg-base-200 drawer drawer-mobile min-h-screen">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle">

    <div class="drawer-content">
        @yield('container')
    </div>

    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <ul class="menu p-4 overflow-y-auto w-80 bg-base-100 text-base-content">
            <li class="text-center">
                <h1 class="text-3xl">Hardlight Academy</h1>
            </li>
            <li class="my-4">
                <a href="{{ route('home') }}" class="btn">Home</a>
            </li>
            <li>
                <a href="{{ route('assignment') }}" class="btn">Assignment</a>
            </li>
        </ul>
    </div>
</div>