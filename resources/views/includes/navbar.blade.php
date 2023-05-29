<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
        @if (env('APP_NAME') != null)
            {{ env('APP_NAME') }}
        @else
            InventorySystem
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('employees') ? 'active' : '' }}">
                    <a class="nav-link" href="/employees">Employees <span class="sr-only">(current)</span></a>
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
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi! {{ Auth::user()->username }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Update password</a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" form="logout" type="submit">Logout</button>
                            <form action="/logout" method="post" id="logout">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    @endauth
</nav>
