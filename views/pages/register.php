<section class="mb-30px">
    <div class="container">
        <div class="hero-banner hero-banner--sm">
            <div class="hero-banner__content">
                <h1>Register</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="section-margin--small section-margin">
    <div class="container form-back">

        <div class="row d-flex justify-content-center">
            <div class="col-md-5 mt-5 mb-5">

                <form class="form-contact contact_form" id="contactForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <label for="name">Name</label>
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter name">
                                <p class="text-error"></p>

                            </div>
                            <label for="name">Email</label>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email">
                                <p class="text-error"></p>

                            </div>
                            <label for="name">Address</label>
                            <br/>
                            <div class="form-group">
                                <input class="form-control" name="address" id="address" type="text" placeholder="Enter address">
                                <i style="font-size:12px;color:orange;">The address is not mandatory...</i>
                                <p class="text-error"></p>
                            </div>
                            <label for="name">Birth date</label>
                            <div class="form-group">
                                <input class="form-control" name="bdate" id="bdate" type="date" placeholder="Enter your birth date">
                                <p class="text-error"></p>
                            </div>
                            <label for="name">Password</label>
                            <div class="form-group">
                                <input class="form-control" name="password" id="password" type="password" placeholder="Enter your password">
                                <p class="text-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center mt-3">
                        <button type="button" id="register_btn" class="button button--active button-contactForm">Register</button>
                        <p id="message_log"></p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <a id="backtotop"></a>
</section>