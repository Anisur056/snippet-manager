<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DYNAMIC INSERT PHP</title>
</head>
<body>
    <h1>Dynamic Data Insert in PHP</h1>
    <a class="addBtnHTML">&plus;</a>

    <form action="" method="post">
        <div class="div-form">

        </div>
        <input type="submit" name="submit" value="save">
    </form>


    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(isset($_POST['userName']))
            {
                foreach($_POST['userName'] as $per_name){
                    echo $per_name."<br>";
                }
            }
            else{
                echo "no Empty input allowed";
            }
            
            
            
        }
    ?>


    <script>
        var addBtnHTML = document.querySelector(".addBtnHTML");
        var divForm = document.querySelector(".div-form");

        addBtnHTML.addEventListener("click", addInput);

        function addInput(){
            var nameInput = document.createElement("input");
            nameInput.type="text";
            nameInput.name="userName[]";
            nameInput.placeholder = "Enter Your Name";

            var closeBtn = document.createElement("a");
            closeBtn.className = "deleteBtn";
            closeBtn.innerHTML = "&times;"
            closeBtn.addEventListener("click", removeInput);

            var divFlex = document.createElement("div");
            divFlex.className = "flex";

            divForm.appendChild(divFlex);
            divFlex.appendChild(nameInput);
            divFlex.appendChild(closeBtn);
        }

        function removeInput(){
            this.parentElement.remove();
        }

    </script>
</body>
</html>
