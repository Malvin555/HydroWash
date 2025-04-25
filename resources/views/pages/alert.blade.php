<div class="opacity-0 fixed top-0 z-50 left-1/2 -translate-x-1/2 w-max transition-all duration-500" id="alertSuccess">
    <div class="bg-green-400 text-green-800 px-4 py-3 rounded-2xl mb-4" role="alert">
        <strong class="font-bold">Success</strong>
        <span class="block sm:inline">{{ session('success') || session('error') }}</span>
    </div>
</div>

<div class="opacity-0 fixed top-0 z-50 left-1/2 -translate-x-1/2 w-max transition-all duration-500" id="alertError">
    <div class="bg-red-400 text-red-800 px-4 py-3 rounded-2xl mb-4" role="alert">
        <strong class="font-bold">Error</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
</div>

@if (session('success') || session('error'))
<script>
    let alertBox = document.getElementById(
        {!! session('success') ? '"alertSuccess"' : '"alertError"' !!}
    );

    setTimeout(() => {
        alertBox.classList.remove('opacity-0', 'top-0');
        alertBox.classList.add('opacity-100', 'top-20');
    }, 100); 

    setTimeout(() => {
        alertBox.classList.remove('opacity-100', 'top-20');
        alertBox.classList.add('opacity-0', 'top-0');
    }, 3000);
</script>
@endif
