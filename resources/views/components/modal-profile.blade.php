<div class="w-full bg-secondary p-2 px-6 text-primary">
    <p class="text-right mb-2">john.doe@gmail.com</p>
    <div class="flex items-center gap-4 mb-2">
        <div class="h-25 w-25 rounded-full bg-white flex items-center border border-primary justify-center text-primary font-medium text-5xl uppercase">
            {{ Str::substr(Auth::user()->name, 0, 2) }}
        </div>
        <div>
            <h1 class="font-medium text-2xl">MARIA (01)</h1>
            <p class="text-[.8rem]">03909814898497</p>
        </div>
    </div>
    <p class="text-right">02 - 49 - 20009</p>
</div>