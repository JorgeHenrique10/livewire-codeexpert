@if (session()->has('message'))
    <div class="w-full py-2 px-4 mb-6 bg-green-400">
        <h2>{{ session('message') }}</h5>
    </div>
@endif
