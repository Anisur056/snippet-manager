<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dailpad > Test</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
        }
        .flex{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .flex-col{
            flex-direction: column;
        }
        body{
            width: 100vw;
            height: 100vh;
            background: #222;
            color: #fff;
            font-family: sans-serif;
        }
        .numberPad{
            background: #111;
            border-radius: 10px;
            padding-bottom: 30px;
        }
        .numberPad .disp input[name="pin"]{
            width: 300px;
            padding: 20px;
            outline: none;
            border: none;
            background: none;
            text-align: center;
            color: #fff;
            font-size: 2em;
        }
        .numberPad .numbers input[name="submit"]{
            outline: none;
            border: none;
            background: #111;
            color: #fff;
        }
        .numberPad .numbers > .row div{
            border: 1px solid #666;
            width: 50px;
            height: 50px;
            margin: 10px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 8px #999;
        }
    </style>
</head>
<body class="flex flex-col">
    <div class="numberPad">
        <div class="disp">
            <form name="loginForm" action="" method="post">
                <input type="text" name="pin">
        </div>

        <div class="numbers">
            <div class="flex row row1">
                <div class="flex jsEvent"><span>1</span></div>
                <div class="flex jsEvent"><span>2</span></div>
                <div class="flex jsEvent"><span>3</span></div>
            </div>

            <div class="flex row row2">
                <div class="flex jsEvent"><span>4</span></div>
                <div class="flex jsEvent"><span>5</span></div>
                <div class="flex jsEvent"><span>6</span></div>
            </div>

            <div class="flex row row3">
                <div class="flex jsEvent"><span>7</span></div>
                <div class="flex jsEvent"><span>8</span></div>
                <div class="flex jsEvent"><span>9</span></div>
            </div>

            <div class="flex row row4">
                <div class="flex jsClear"><span>Clear</span></div>
                <div class="flex jsEvent"><span>0</span></div>
                <div class="flex jsSubmit"><span><input type="submit" name="submit" value="Login"></span></div>
            </div>
        </div>
            </form> 
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            echo $_POST['pin'];
            // header('location: test-dialpad-2.php');
            
        }
    ?>



    <script>
        var allNumbersBtn = document.querySelectorAll(".row > .jsEvent");
        var pinInputField = document.querySelector('input[name="pin"]');
        var clearBtn = document.querySelector(".jsClear");

        allNumbersBtn.forEach(val => {
            val.addEventListener("click", ()=> {
                pinInputField.value += val.innerText;
            });
        });
        
        clearBtn.addEventListener("click",()=> {
            pinInputField.value = "";
        });

    </script>
</body>
</html>
