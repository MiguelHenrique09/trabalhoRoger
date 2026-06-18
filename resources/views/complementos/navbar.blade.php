<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}" >
            Blog do Roger
        </a>


        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">


            <ul class="navbar-nav ms-auto">


             


                <li class="nav-item">

                    <a class="nav-link" href="{{ route('categorias') }}" >
                        Categorias
                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>