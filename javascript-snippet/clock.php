<html lang="en">
<head>
<meta charset="UTF-8">
<meta    name="viewport" 
        content="
        width=device-width, 
        initial-scale=1.0">
<title>JS CLOCK</title>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial;
        font-size: 20pt;
    }
    body{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        background: #efefef;
    }
    h1{
        font-size: 30pt;
    }
    #clock{
        border: 1px solid #e8e8e8;
        padding: 16px;
        border-radius: 4px;
        font-weight: bold;
}
</style>
</head>
    <body>
        
    <h1>JavaScript Clock</h1><br>
    <input type="time" name="time" id="clock">

    <script>
    const timeElement = 
        document.getElementById("clock");

    setInterval(function() {
        const now = new Date();

        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();

        const clockStr = 
                hours.toString().padStart(2, '0')+`:`+
                minutes.toString().padStart(2, '0') +`:`+ 
                seconds.toString().padStart(2, '0');

        timeElement.value = clockStr;
    }, 1000);
    </script>
</body>
</html>
