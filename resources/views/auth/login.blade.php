
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Manajemen Administrasi Sekolah</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(to left, #6777ef, #79e7fa);
        }
        h1 {
            text-align: center;
            font-weight: bold;
        }
        .tulisan_login {
            text-align: center;
            text-transform: uppercase;
        }
        .kotak_login {
            border: 0;
            width: 350px;
            background: white;
            border-radius: 9px;
            margin: 120px auto;
            padding: 30px 20px;
            border: 1px solid #e2e2e2;
        }
        label {
            font-size: 11pt;
        }
        .form_login {
            background: rgb(255, 255, 255);
            margin: 10px auto;
            /* text-align: center; */
            border: 1px solid #e2e2e2;
            box-sizing: border-box;
            border-radius: 5px;
            width: 100%;
            padding: 14px 10px;
            font-size: 11pt;
        }
        .tombol_login {
            background: #3bbaf4;
            color: white;
            font-size: 11pt;
            width: 100%;
            margin: 9px auto;
            border: none;
            border-radius: 5px;
            /*pojok kotak*/
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
        }
        .tombol_login[type="submit"]:hover {
            background: #6bc6f0;
        }
    </style>
</head>

<body>
    <div class="kotak_login">
        @if(session('sukses'))
            <div class="alert alert-danger" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2 class="font-weight-bold text-center">Sistem</h2>
        <h3 class="font-weight-bold text-center">Kartu Rencana Studi</h3>
        <form action="postlogin" method="POST">
            @csrf
            <input type="text" name="username" class="form_login" placeholder="Username" required>
            <input id="password" type="password" name="password" class="form_login" placeholder="Password" required>
            <button type="submit" class="tombol_login">LOGIN</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
