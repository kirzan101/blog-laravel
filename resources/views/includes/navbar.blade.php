<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        @if (env('APP_NAME') != null)
            {{ env('APP_NAME') }}
        @else
            Laravel
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('employee') ? 'active' : '' }}">
                <a class="nav-link" href="/employee">Employee <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('departments') ? 'active' : '' }}">
                <a class="nav-link" href="/departments">Departments <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('usergroups') ? 'active' : '' }}">
                <a class="nav-link" href="/usergroups">User Groups <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('accountabilities') ? 'active' : '' }}">
                <a class="nav-link" href="/accountabilities">Accountabilities <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('items') ? 'active' : '' }}">
                <a class="nav-link" href="/items">Items <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('suppliers') ? 'active' : '' }}">
                <a class="nav-link" href="/suppliers">Suppliers <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>