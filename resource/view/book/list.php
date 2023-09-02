<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <meta http-equiv="" content="3;url=http://localhost:9000" />-->
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <?php
        /*    if (count(error()) > 0 ):
                foreach (error() as $error):
                    */?><!--
                    <div class="alert alert-danger" role="alert">
                        <?php /*echo  $error */?>
                    </div>
                --><?php
/*                endforeach;
            endif;*/
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="" action="http://localhost:9000/book/save" method="POST" novalidate>
                <div class="col-md-12">
                    <label for="validationServer01" class="form-label">First name</label>
                    <input type="number" name="name" class="form-control <?php if (error("name")!== false){ echo 'is-invalid';} ?>" id="name" value="<?php echo  old("name")?>">
                    <?php if (error("name")!== false): ?>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo error("name") ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label for="validationServer02" class="form-label">Surname</label>
                    <input type="text" name="surname"  class="form-control <?php if (error("surname")!== false){ echo 'is-invalid';} ?>" id="surname" value="<?php echo  old("surname")?>">
                    <?php if (error("surname")!== false): ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php echo error("surname") ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label for="validationServer03" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control <?php if (error("email")!== false){ echo 'is-invalid';} ?>" id="email" value="<?php echo  old("email")?>">
                    <?php if (error("email")!== false): ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php echo error("email") ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label for="validationServer03" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <?php if (error("password")!== false){ echo 'is-invalid';} ?>" id="password">
                    <?php if (error("password")!== false): ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php echo error("password") ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <label for="validationServer03" class="form-label">Password Confirmed</label>
                    <input type="password" name="confirmed_password" class="form-control <?php if (error("confirmed_password")!== false){ echo 'is-invalid';} ?>" id="password">
                    <?php if (error("confirmed_password")!== false): ?>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?php echo error("confirmed_password") ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-5">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>