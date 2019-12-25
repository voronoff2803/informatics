function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}



var times = 10;
for(var i=0; i < times; i++){
    var man = 100000 + getRandomInt(150000);
    console.log(man)
    sleep(150);
}
