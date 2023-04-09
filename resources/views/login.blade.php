<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sekolah Tinggi Multi Media "MMTC" Yogyakarta | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .main {
        height: 100vh;
        box-sizing: border-box;
    }
    .login-box {
        width: 500px;
        border: solid 1px;
        padding: 30px;
        margin-top: 50px;
        justify-content: center;
        align-items: center;
    }
    form div {
        margin-bottom: 15px;
    }
    .head {
        text-align: center;
        margin-bottom: 500px;
    }
    .main{
        align-items: center;
    }
</style>
<body>
    <div class="main d-flex justify-content-center align-items-center">
        <div class="head">
            <h1>Selamat Datang di web STMM</h1>
        </div>
        <div class="login-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div>
                    <p>First time using Sarana Penunjang STMM?
                        <a href="register">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>