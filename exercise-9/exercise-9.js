// Решаване на линейно уравнение

function solve() {
  let a, b, x;
  
  a = document.getElementById('a').value;
  b = document.getElementById('b').value;  
  
  if (a == 0) {
    if (b == 0) {
       document.getElementById('c').innerHTML = "Всяко x е решение!";
    } else {
       document.getElementById('c').innerHTML = "Уравнението няма решение";    
    }
  } else {
    x = -b / a;
    document.getElementById('c').innerHTML = "Коренът на уравнението е x = "+x;
  }

}

