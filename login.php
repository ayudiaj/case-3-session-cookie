<?php
session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = trim($_POST["email"]); 
    $password = $_POST["password"];

    $_SESSION["email"] = $email;

    if (isset($_POST["remember-me"]) && $_POST["remember-me"] == "on") {
        setcookie("remembered_email", $email, time() + 86400);
    } else {
        setcookie("remembered_email", "", time() - 3600);
    }

    echo json_encode(array("success" => true));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h3 class="mb-5 text-center">Sign in</h3>
                            <form id="loginForm">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="Masukkan Email"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" placeholder="Masukkan Password" />
                                    <span id="passwordHelpInline" class="form-text text-secondary">
                                        Password harus berisi kapital, simbol dan angka
                                    </span>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember-me">
                                    <label class="form-check-label" for="rememberPassword"> Remember Me </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>