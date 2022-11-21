let a = 1;  // Локална променлива
let b = 10; 
let c;

c = a + b;


//var scriptName = "index.html"; // глобална променлива

// document.write("<h1>c = "+c+"</h1>");

/* Цикъл for */
/*
for (let i = 1; i < 10; i++) {
	document.write("<h2>i = "+i+"</h2>");
}
*/

/*Дефиниране на функция, процедура */
function myClick() 
{	
	document.getElementById('content').innerHTML = "<h1>Вие натиснахте втория линк!</h1>";
}

function echo(str) {
	document.getElementById('content').innerHTML = str;
}

/* Дефиниране на обект */
var car1 = {
	'name': "Peter",
	'make': "Ferrari",  // property
	'numDoors' : 4,     // property
	'printToScreen' : function () {	
		echo("This is "+this.name +"'s car. It is a "+this.make+" and has "+this.numDoors+" doors");
	} // method 
}
var car2 = {
	'name': "Ivan",
	'make': "BMW",  // property
	'numDoors' : 4,     // property
	'printToScreen' : function () {
		echo("This is "+this.name +"'s car. It is a "+this.make+" and has "+this.numDoors+" doors");
	} // method 
}
var car3 = {
	'name': "Stoyan",
	'make': "Volvo",  // property
	'numDoors' : 4,     // property
	'printToScreen' : function () {
		echo("This is "+this.name +"'s car. It is a "+this.make+" and has "+this.numDoors+" doors");
	} // method 
} 
/*
// Друг начин за дефиниране на обект
var car4 = {};

// Properties
car4.name = "Andrew";
car4.make = "Sedan";
car4.numDoors = 4;
car4.status = false;

// Methods
car4.printToScreen = function () {
	echo("This is "+this.name +"'s car. It is a "+this.make+" and has "+this.numDoors+" doors");
}

car4.start = function () {
  this.status = true;
}

car4.stop = function () {
  this.status = false;
}

document.onload = car4.printToScreen();
* */

/* всичко, което виждате в браузъра е обект */

/* Прозорец на браузъра */

// window.alert("Hello"); // метод за изкачащо съобщение

// window.location = "http://abv.bg/"; // Сменя адреса на прозореца
// window.open("", "", "width=200,height=200");

document.onload = function() {
  document.getElementById('link-4').href = "www.Google.com";
  document.getElementById('link-4').innerHTML = "Go to Google";
}





