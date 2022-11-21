let average = {};

// Propereties
average.numbers = [];

// Methods
average.getNumbers = function () {
  let txt = document.getElementById('numbers').value;
  this.numbers = txt.split('\n');
  for (i = 0; i < this.numbers.length; i++) {
    this.numbers[i] = parseFloat(this.numbers[i]);
  }
  
  let average = this.calcAverage();
  let deviation = this.calcDeviation(average);
  
  document.getElementById('result1').innerHTML = "Средно аритметично = " + average;
  document.getElementById('result2').innerHTML = "Стандартно отклонение = " + deviation ;
}

average.calcAverage = function () {
  if (this.numbers.length > 0) {
    let sum = 0;
    let n = 0; 
    for (i = 0; i < this.numbers.length; i++) {
      // sum = sum + this.numbers[i];
      // sum += this.numbers[i];
      //sum = sum - (-this.numbers[i]);
      if (!isNaN(this.numbers[i])) {
        n++; 
        sum = sum + parseFloat(this.numbers[i]);
      }
    }
    return sum/n; 
  } else {
    return 0;
  }
}

average.calcDeviation = function (average) {
  if (this.numbers.length > 0 && typeof average !== 'undefined') {
    let sum = 0;
    let n   = 0;
    let deviation;
    
    for (i = 0; i < this.numbers.length; i++) {
      if (!isNaN(this.numbers[i])) {
        n++; 
        sum = (this.numbers[i] - average) * (this.numbers[i] - average) ;
      }
    }
    if (n > 1) {
      deviation = Math.sqrt(sum / (n - 1));
      return deviation;
    }
  }
  return false;
}

