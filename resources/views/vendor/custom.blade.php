@if ($paginator->hasPages())
    <nav class="flex justify-center mt-4">
        <ul class="flex items-center space-x-2">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-1 bg-white text-gray-600 rounded-xl border border-yellow-500">«</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 bg-yellow-500 text-black rounded-xl border border-yellow-500 hover:bg-yellow-600">«</a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="px-3 py-1 bg-white text-gray-500 rounded-xl border border-yellow-500">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-1 bg-yellow-500 text-black font-bold rounded-xl border border-yellow-600">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-1 bg-white text-gray-800 rounded-xl border border-yellow-500 hover:bg-yellow-400 hover:text-black">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-yellow-500 text-black rounded-xl border border-yellow-500 hover:bg-yellow-600">»</a>
                </li>
            @else
                <li>
                    <span class="px-3 py-1 bg-white text-gray-600 rounded-xl border border-yellow-500">»</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
