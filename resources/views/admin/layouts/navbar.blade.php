<nav class="navbar navbar-light bg-light border-bottom">

    <div class="container-fluid">

        <span class="navbar-brand">

            Admin Panel

        </span>

        <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">

                {{ auth()->user()->name }}

            </button>

            <ul class="dropdown-menu">

                <li>

                    <a class="dropdown-item" href="#">
                        Profile
                    </a>

                </li>

                <li>

                    <hr class="dropdown-divider">

                </li>

                <li>

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button class="dropdown-item">
                            Logout
                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>
