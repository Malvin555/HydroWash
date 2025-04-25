<div class="bg-primary px-2 rounded-sm shadow-md mb-6 col-span-2">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y bg-primary divide-gray-200 rounded-sm">
            <thead class="bg-primary">
                {{ $thead }}
            </thead>
            <div>
                {{ $tbody }}
            </div>
        </table>
    </div>

    {{ $pagination }}
</div>