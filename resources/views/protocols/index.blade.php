<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🧪 プロトコール一覧
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @foreach($protocols as $protocol)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $protocol->category }}
                        </span>
                        <span class="text-xs text-gray-400">ID: {{ $protocol->id }}</span>
                    </div>
                    
                    <h3 class="text-xl font-bold mb-4">{{ $protocol->title }}</h3>
                    
                    <div class="bg-gray-50 p-3 rounded mb-4">
                        <strong class="text-sm text-gray-500 block mb-1">【材料】</strong>
                        <p class="text-sm">{!! nl2br(e($protocol->materials)) !!}</p>
                    </div>

                    <div>
                        <strong class="text-sm text-gray-500 block mb-1">【手順】</strong>
                        <p class="leading-relaxed">{!! nl2br(e($protocol->steps)) !!}</p>
                    </div>
                    
                    @if($protocol->notes)
                    <div class="mt-4 p-3 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 text-sm">
                        <strong>⚠️ 注意:</strong> {{ $protocol->notes }}
                    </div>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</x-app-layout>