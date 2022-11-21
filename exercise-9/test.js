function solve() {
  let a = document.getElementById('inpA').value;
  let b = document.getElementById('inpB').value;
  let c = undefined;
  let err = "";
  
  // Validate input
  if (isNaN(a) == true) {
    err += "Въвдете число за операнд a. ";
  }
  if (isNaN(b) == true) {
    err += "Въвдете число за операнд b. ";
  }
  if (err != "") {
    document.getElementById('error').innerHTML = err;
    return false;
  }

  // Calculate result
  if (a == 0) {
    if (b == 0) {
      c = "Всяко X е решение.";
    } else {
      c = "Уравнението няма решение.";
    }
  } else {
    c = - b/a;
  }
  document.getElementById('result').value = c;
  return false;
}
