<form action="" method="POST" class="inline" onsubmit="return confirm('Are you sure to want delete this?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="flex justify-center items-center w-full px-4 py-2 rounded-md bg-red-600 text-white font-medium cursor-pointer">
        Delete
    </button>
</form>