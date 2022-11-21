let eq = {};
let eq1 = eq;

// Properties
eq.a     = null;
eq.b     = null;
eq.c     = null;
eq.err   = "";

// Method
eq.validate = function() {
  // Validate input
  if (isNaN(this.a) == true) {
    this.err += "Въвдете число за операнд a. ";
  }
  if (isNaN(this.b) == true) {
    this.err += "Въвдете число за операнд b. ";
  }
  if (this.err != "") {
    document.getElementById('error').innerHTML = this.err;
    return false;
  }
}

eq.solve = function () {
  
  this.a = document.getElementById('inpA').value;
  this.b = document.getElementById('inpB').value;
  
  this.validate();


  // Calculate result
  if (this.a == 0) {
    if (this.b == 0) {
      this.c = "Всяко X е решение.";
    } else {
      this.c = "Уравнението няма решение.";
    }
  } else {
    this.c = - this.b/this.a;
  }
  document.getElementById('result').value = this.c;
  return false;
}

var numbers = [123, 456, 765465, 565, 6776, 67676];

let masiv = ["Stoayn", 1234.567, true, {'a':123, 'b':"str"}];


