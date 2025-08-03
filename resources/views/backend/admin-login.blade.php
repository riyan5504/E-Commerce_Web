<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style-type: none;
            border: none;
            outline: none;
            font-family: Poppins, sans-serif;
            color: #fff;
        }

        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("https://i.postimg.cc/RFqSM2rc/bg.jpg");
            background-size: cover;
            background-position: center;
        }

        .content {
            width: 400px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(13px);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px 35px;
        }

        .content h2 {
            font-size: 38px;
            font-weight: 700;
            text-align: center;
        }

        .content .input-box {
            position: relative;
            width: 100%;
            height: 55px;
            margin: 30px 0;
        }

        .content .input-box input {
            background: transparent;
            width: 100%;
            height: 100%;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            padding: 20px 45px 20px 20px;
            font-size: 16px;
        }

        input::placeholder {
            color: #fff;
            font-size: 16px;
        }

        .input-box i {
            position: absolute;
            top: 50%;
            right: 18px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #fff;
        }


        .btnn {
            display: inline-block;
            background: #fff;
            color: #0a2862;
            width: 100%;
            border-radius: 30px;
            font-size: 16px;
            height: 45px;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            margin-bottom: 30px;
            margin-top: 16px;
        }

        input[type="checkbox"] {
            display: inline-block;
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }
    </style>
</head>

<body>
    <div class="content">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="input-box">
                <input type="text" name="email" placeholder="Enter Your Email" required />
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required/>
            </div>

            <button type="submit" class="btnn">Login</button>

        </form>
    </div>
</body>

</html>
