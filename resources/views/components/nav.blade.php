<nav class="flex gap-4 p-4 w-full bg-slate-400">
    <a href="/">Landing</a>
    <a href="/home">Homepage</a>
    @auth
        <a href="{{ route('logout') }}">Logout</a>
        @else
        <a href="/login">Login</a>
    @endauth
</nav>