/* Експерименти с jQuery */
/*
$(document).ready( function() {    
})
*/


let equation = {};

// Propereties / свойства
equation.a  = undefined; 
equation.b  = undefined;
equation.c  = undefined;
equation.D  = undefined;
equation.x1 = undefined;
equation.x2 = undefined;

// Method / методи
equation.getParameters = function ()
{
  this.a = document.getElementById('a').value - 0;
  this.b = document.getElementById('b').value - 0;
  this.c = document.getElementById('c').value - 0;  
}

equation.calculate = function() 
{
  this.getParameters();
  this.show();
  equation.solve();
}

equation.show = function()
{
  let equationText = "";
  equationText += this.a;
  equationText += "x<sup>2</sup> + ";
  equationText += this.b;
  equationText += "x + ";
  equationText += this.c;
  equationText += " = 0";
  
  // Native JS
  //document.getElementById('show').innerHTML = equationText;
  
  // jQuery code
  $("#show").html( equationText );
  
  // Манилупалция на CSS
  $("#show").css("color", "blue");
  /* Equivalent CSS
  #show {
    color: blue;
  }
  */
}

equation.solve = function()
{
  this.D = this.b*this.b - 4 * this.a * this.c;
  
  // Native JS
  // document.getElementById('showD').innerHTML = "D = " + this.D;
  
  // jQuery code
  $('#showD').html("D = " + this.D);
  
  if (this.D < 0) {
    $("#showD").css("color", "red");
    $("#result1").html("Уравнението няма реални корени");
  } else if (this.D == 0) {
    $("#showD").css("color", "blue");
    this.x1 = -this.b/(2*this.a);  
    $("#result1").html("Уравнението  има един реален корен x = "+x1);
    
  } else if(this.D > 0) {
    $("#showD").css("color", "green");
    console.log("a = " +  this.a);
    console.log("b = " +  this.b);
    console.log("D = " +  this.D);
    this.x1 = (-this.b + Math.sqrt(this.D)) / (2*this.a);
    this.x2 = (-this.b - Math.sqrt(this.D)) / (2*this.a);
    
    $("#result1").html("Уравнението  има два реални корена: x1 = "+this.x1 +" и x2 = "+this.x2);
    
  }

}
