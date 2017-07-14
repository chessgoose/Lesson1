<!DOCTYPE html>

<html>
<head>
    <link href="util/css/metro.min.css" rel="stylesheet">
    <link href="util/css/metro-colors.min.css" rel="stylesheet">
    <style>
    	body {
    		padding: 10px;
    	}
    	#checkBoxForm {
    		border: ridge 1px green;
    		padding: 10px;
    		width: 400px;
    	}
    	#checkBoxForm label {
    		color: black;
    	} 
        #checkBoxForm input[type="checkbox"] {
            margin-right: 5px
        } 
    </style>
</head>
	<body id="body" >
		<h1 class = "ol-blue"> To-do App</h1>
		<br>
		<h2 class = "bd-blue"> What you need to do today: </h2>
		<br>
		<form id = "checkBoxForm" class = "bg-blue">
			<!-- It works now! When we dynamically added the label, we didn't have a space between -->

            <?php


                $todos = array(
                    "Write some HTML code",
                    "Go shopping",
                    "Write a 500 page essay",
                    "Do stuff",
                    "Write PHP",
                    "Write Python",
                    "Learn jQuery",
                    "Make a scouting app"
                );

                shuffle($todos);

                $random_keys=array_rand($todos,5);

                $random_number = rand(0,5);

              	$rand_keysLength=count($random_keys);
 
               	for ($x=0; $x<$rand_keysLength; $x++) {
     				echo '<input type="checkbox">'. PHP_EOL;
     				echo '<label>';
                    echo  $todos[$random_keys[$x]];
                    echo  '</label>'.PHP_EOL;
                    echo '<br>' . PHP_EOL;
				}


            ?>
		</form>
		<br>
			<label> Create new To-Do Item </label>
			<div class="input-control text">
   				 <input type="text" id="createNewItemInput" placeholder="Type your to-do item here">
			</div>
			<button type = "button" id = "newButton" class = "button rounded"> Create </button>
		<br>
		<br>
		<button type = "button" id = "backgroundButton" class = "button bg-blue fg-white"> Randomize background color</button> <br>	    
		<br>
		<p> Created using Metro UI CSS</p>
	</body>
	<script>
		/**var backgroundButton = document.getElementById("backgroundButton");
		var newButton = document.getElementById("newButton");
		var body = document.getElementById("body");
		var checkBoxesArray = document.querySelectorAll("input[type='checkbox']");
		var arrayOfLabels = document.getElementById('checkBoxForm').getElementsByTagName('label');
		var colorArray = ["white","green","red","yellow"];
		var lastNumberPicked = 0;

		var colorChange = function(){
			var myLabel = this.nextElementSibling;
			if(this.checked){
				myLabel.style.color = "green";
				myLabel.innerHTML += " (DONE)";
			} else {
				myLabel.style.color = "white";
				myLabel.innerHTML = myLabel.innerHTML.replace(" (DONE)", " ");
			}
		}

		for (var i = 0;i<checkBoxesArray.length;i++){
			checkBoxesArray[i].onclick = colorChange;	
		}

		
		//Function now ensures that you pick a different number/color every time.
		var clickOnBackgroundButton = function(){

			//Pick the number.
			var pickRandom = Math.floor(Math.random() * 4);

			//Mechanism to pick is below.  If it does not equal the last number picked, then set background color to color picked and change the last number picked to the color you just picked.  Otherwise, repick by recalling the function.
			if(pickRandom !== lastNumberPicked) {
				body.style.backgroundColor = colorArray[pickRandom];
				lastNumberPicked = pickRandom;
			} else {
				clickOnBackgroundButton();
			}
		};

		var createNewCheckbox = function(){
  			var inputElement = document.createElement("input");
  			inputElement.type = 'checkbox';
  			inputElement.onclick = colorChange;
   			return inputElement;
		};

		var clickOnNewButton = function(){
			var labelElement = document.createElement("label");
			var aNewBreak = document.createElement("br");
			var userInput = document.getElementById("createNewItemInput").value;
			labelElement.innerHTML = " " + userInput;
			labelElement.style.color = "white";
			checkBoxForm.appendChild(createNewCheckbox());
			checkBoxForm.appendChild(labelElement);
			checkBoxForm.appendChild(aNewBreak);
			document.getElementById("createNewItemInput").value = "";
		};

		var enterFunction = function(event){
			var whatWasPressed = event.which || event.KeyCode;
			if(whatWasPressed === 13){
				clickOnNewButton();
			}
		};


		//Add the event listener
		backgroundButton.addEventListener('click', clickOnBackgroundButton);
		newButton.addEventListener('click',clickOnNewButton);**/

	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		var colorArray = ["white","green","red","yellow"];
		var lastNumberPicked = 0;

        function onCheckboxClicked(){
            if(this.checked){
                //Not sure if this is the way to access the label element.
                $(this).next().css("color","green");
                var curText = $(this).next().text()
                $(this).next().text(curText +" (DONE)");
            } else {
                $(this).next().css("color","black");
                var curText = $(this).next().text()
                $(this).next().text(curText.replace(" (DONE)", ""));
            }
        }

        $("#checkBoxForm").on("click","input[type='checkbox']",onCheckboxClicked)



        function createNewTodo() {

                //The attribute method and the color changing doesn't work, but everything else works.
                var userInput = $("#createNewItemInput").val();
                var labelElement =  $('<label>'+userInput+'</label>').css("color","black");
                var newCheckBox = $("<input type='checkbox'></input>");
                var br = $("<br>");
                $('#checkBoxForm').append(newCheckBox);
                $('#checkBoxForm').append(labelElement);
                $('#checkBoxForm').append(br);
                // $('#checkBoxForm').append(document.createTextNode(" " + userInput));
                $("#createNewItemInput").val("");
        }

		$("#createNewItemInput").keypress(function(e){
            if(e.which == 13) {
                createNewTodo();
            }
        });

        function clickOnBackgroundButton() {
        	var pickRandom = Math.floor(Math.random() * 4);
        	console.log(pickRandom);
			if(pickRandom !== lastNumberPicked) {
				$('#body').css("background-color", colorArray[pickRandom]);
				lastNumberPicked = pickRandom;
			} else {
				clickOnBackgroundButton();
			}
        };

        $('#newButton').click(createNewTodo)

        $('#backgroundButton').click(clickOnBackgroundButton);

	</script>
</html>
