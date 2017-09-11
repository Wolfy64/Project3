<div clas="view hm-black-strong">
    <div class="full-bg-img flex center">
        <div class= "container">

            <nav class="row navbar navbar-expand-sm navbar-light">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarToggler">

                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0  mx-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="/index"> HOME <span class="sr-only">(current)</span> </a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="/#about"> ABOUT </a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="/alaska"> THE BOOK </a>
                        </li>

                        <?php if ( isset($_SESSION['admin']) ){ ?>

                            <li class="nav-item">
                                <a class="nav-link" href="/admin/home"> DASHBOARD </a>
                            </li>

                        <?php }; ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/signIn"> <i class="fa fa-user-circle fa-lg"></i> </a>
                        </li>

                    </ul>

                </div>
        
            </nav>
            
        </div>
    </div>