<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Trang quản trị') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Hero -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 overflow-hidden shadow-xl sm:rounded-2xl mb-8">
                <div class="p-8 sm:p-12 text-white">
                    <h3 class="text-3xl font-bold mb-2">Chào mừng, {{ Auth::user()->name }}!</h3>
                    <p class="text-indigo-100 text-lg">Hệ thống quản lý nhà sách HUB luôn sẵn sàng phục vụ bạn.</p>
                </div>
            </div>

            <!-- Stats Grid -->
            @php
                $bookCount = DB::table('sach')->count();
                $lastBook = DB::table('sach')->latest('id')->first();
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Books -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium tracking-wide uppercase">Số lượng sách</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $bookCount }} quyển</p>
                    </div>
                </div>

                <!-- Last Added -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
                    <div class="p-3 bg-green-50 rounded-xl text-green-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium tracking-wide uppercase">Sách mới nhất</p>
                        <p class="text-sm font-bold text-gray-900 truncate max-w-[150px]">{{ $lastBook->tieu_de ?? 'Trống' }}</p>
                    </div>
                </div>

                <!-- Quick Action -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4 group cursor-pointer hover:border-indigo-300 transition-colors">
                    <a href="{{ url('sach') }}" class="flex items-center space-x-4 w-full">
                        <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium tracking-wide uppercase">Vào cửa hàng</p>
                            <p class="text-sm font-bold text-gray-900">Xem ngay &rarr;</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Detailed Content Placeholder -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <h4 class="text-lg font-semibold mb-4 border-b pb-2">Thông báo mới nhất</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <div class="bg-blue-500 w-2 h-2 rounded-full mt-2 shrink-0"></div>
                            <p class="text-gray-600 text-sm italic">Chào mừng bạn đã tham gia hệ thống quản lý HUB Book Store.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

