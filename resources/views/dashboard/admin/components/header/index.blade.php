<div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button" class="text-lg text-gray-600 sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>
    <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
            <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
        </li>
        <li class="text-gray-600 mr-2 font-medium">/</li>
        <li class="text-gray-600 mr-2 font-medium">Analytics</li>
    </ul>
    <ul class="ml-auto flex items-center">
        <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
                <img src="{{asset('asset/tt.svg')}}" alt=""
                    class="w-8 h-8 align-middle">
            </button>
            <ul
                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="text-sm ml-4" type="submit">LogOut</button>
                    </form>
                </li>
            </ul>
        </li>
        {{-- <li class="ml-4">
            {{ $namaPetugas }}
        </li> --}}
    </ul>
</div>
