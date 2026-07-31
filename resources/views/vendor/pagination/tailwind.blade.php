@if ($paginator->hasPages())
    <nav class="flex items-center justify-between gap-4">

        <!-- Info -->
        <div class="text-sm text-gray-600">
            Menampilkan
            <span class="font-semibold text-gray-800">
                {{ $paginator->firstItem() }}
            </span>
            –
            <span class="font-semibold text-gray-800">
                {{ $paginator->lastItem() }}
            </span>
            dari
            <span class="font-semibold text-gray-800">
                {{ $paginator->total() }}
            </span>
            data
        </div>

        <!-- Pagination -->
        <ul class="inline-flex items-center gap-1">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 text-sm rounded-lg border text-gray-400 cursor-not-allowed">
                        ‹
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-3 py-2 text-sm rounded-lg border
                          hover:bg-blue-50 hover:text-blue-700 transition">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                {{-- Dots --}}
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-2 text-sm text-gray-500">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Page Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span
                                    class="px-3 py-2 text-sm font-semibold
                                       rounded-lg bg-blue-600 text-white">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-3 py-2 text-sm rounded-lg border
                                      hover:bg-orange-50 hover:text-orange-600
                                      transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-3 py-2 text-sm rounded-lg border
                          hover:bg-blue-50 hover:text-blue-700 transition">
                        ›
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 text-sm rounded-lg border text-gray-400 cursor-not-allowed">
                        ›
                    </span>
                </li>
            @endif

        </ul>
    </nav>
@endif
