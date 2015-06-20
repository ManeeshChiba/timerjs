var currentDate,
    currentHours,
    currentMinutes,
    currentSeconds;

var a = [2,3,5,6,7,8,9],
    b = [1,2,3,4,7,8,9],
    c = [1,3,4,5,6,7,8,9],
    d = [2,3,5,6,8],
    e = [6,8,2],
    f = [4,5,6,8,9],
    g = [2,3,4,5,6,8,9];


function updateDate(){
    currentDate = new Date();
    currentHours = currentDate.getHours();
    currentMinutes = currentDate.getMinutes();
    currentSeconds = currentDate.getSeconds();
}

function splitDigits(num){

}

function checkVal(val,array){
    for (var k = 0; k < array.length; k++){
        if (val == array[k]){
            return true;
        }
    }
    return false;
}

function turnOn(elem){
    $(elem).addClass('on');
}

$( document ).ready(function() {
    setInterval(function(){
        // $('.segment').toggleClass('on');
        $('.dot').toggleClass('on');
    },750);

    // console.log( checkVal(8,a) );

    setInterval(function(){
        updateDate();
        // console.log(currentHours);

        var hours = [];
        var hourString = currentHours.toString();

        for (var i = 0; i < hourString.length; i++) {
            hours.push(+hourString.charAt(i));
        }

        for (var j = 0; j < hours.length; j++){
            if ( checkVal(hours[j],a) == true){
                turnOn('.h1 .a');
            }
        }

        // console.log(hours);

    },1000);

});