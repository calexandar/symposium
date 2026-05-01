<form method="POST" action="{{ $route }}">
    @method('delete')
    @csrf

    <a href="#"
     class="text-sm text-red-600 hover:text-red-900 underline"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ $text }}
    </a>
</form>