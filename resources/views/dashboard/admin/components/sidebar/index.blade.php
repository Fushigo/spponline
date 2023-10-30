  <!-- start: Sidebar -->
  <div class="fixed left-0 top-0 w-64 h-full bg-blue-900 p-4 z-50 sidebar-menu transition-transform">
      <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
          <img src="{{ asset('asset/logo.svg') }}" alt="" class="w-full h-8 object-cover">
      </a>
      <ul class="mt-4">
          <li class="mb-1 group active">
              <a href="/admin/dashboard"
                  class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                  <i class="ri-home-2-line mr-3 text-lg"></i>
                  <span class="text-sm">Dashboard</span>
              </a>
          </li>
          <li class="mb-1 group">
              <a href="#"
                  class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                  <i class="ri-instance-line mr-3 text-lg"></i>
                  <span class="text-sm">User Management</span>
                  <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
              </a>
              <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                  <li class="mb-4">
                      <a href="/admin/dashboard/datasiswa"
                          class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data
                          Siswa</a>
                  </li>
                  <li class="mb-4">
                      <a href="/admin/dashboard/datapetugas"
                          class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data
                          Petugas</a>
                  </li>
                  <li class="mb-4">
                      <a href="/admin/dashboard/dataadmin"
                          class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data
                          Admin</a>
                  </li>
              </ul>
          </li>
          <li class="mb-1 group">
              <a href="#"
                  class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                  <i class="ri-flashlight-line mr-3 text-lg"></i>
                  <span class="text-sm">Spp Management</span>
                  <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
              </a>
              <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                  <li class="mb-4">
                      <a href="/admin/dashboard/dataspp"
                          class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data
                          Spp</a>
                  </li>
                  <li class="mb-4">
                      <a href="{{ route('pembayaran.index') }}"
                          class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Entri
                          Transaksi</a>
                  </li>
                  <li class="mb-4">
                      <a href="/admin/dashboard/pembayaran/admin/history"
                          class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">History</a>
                  </li>
              </ul>
          </li>
          <li class="mb-1 group">
              <a href="/admin/dashboard/datakelas"
                  class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                  <i class="ri-settings-2-line mr-3 text-lg"></i>
                  <span class="text-sm">Data Kelas</span>
              </a>
          </li>
      </ul>
  </div>
  <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
  <!-- end: Sidebar -->
