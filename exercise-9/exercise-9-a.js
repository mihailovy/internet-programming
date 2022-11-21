// Решаване на линейно уравнение

let equation = {}; // Създавам нов обект

// Properties
equation.a = null;
equation.b = null;
equation.x = null;

// Methods
equation.getParameters = function () {
  let error = false;
  // alert(document.getElementById('a').value !== "");
  
  
  if (document.getElementById('a').value == "") {
    this.printError("Грешка: моля задайте стойност за a!");
    error = true;
  } else if( isNaN(document.getElementById('a').value) ) {
    this.printError("Грешка: моля задайте стойност за a, която да е число!");
    error = true;
  } else {  
    this.a = document.getElementById('a').value;
  }
  
  if (document.getElementById('b').value == "") {
    this.printError("Грешка: моля задайте стойност за b!");
    error = true;
  } else if( isNaN(document.getElementById('b').value) ) {
    this.printError("Грешка: моля задайте стойност за b, която да е число!");
    error = true;
  } else {  
    this.b = document.getElementById('b').value;
  } 

  return error;
}

equation.solve = function () {
  this.clearResult();
  this.clearError();
  
  let error = this.getParameters();
  
  if (error == false) {
    if (this.a == 0) {
      if (this.b == 0) {
         this.printResult("Всяко x е решение!");
      } else {
         this.printResult("Уравнението няма решение");    
      }
    } else {
      this.x = -this.b / this.a;
      this.printResult("Коренът на уравнението е x = "+this.x);
    }
  }
}

equation.clearResult = function () {
  document.getElementById('c').innerHTML = "";
}

equation.printResult = function ( result ) {
  document.getElementById('c').innerHTML = result;
}

equation.clearError = function ( errorString ) {
  document.getElementById('error').innerHTML = "";
}

equation.printError = function ( errorString ) {
  document.getElementById('error').innerHTML += errorString;
}
