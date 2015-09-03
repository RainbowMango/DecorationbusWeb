/**
 * Created by ruby on 15/7/20.
 */

function checkEmail(str){
    var re = /^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/
    if(!re.test(str)){
        return false;
    }
    return true;
}

function checkPassword(str){
    if(str.length < 6) {
        return false;
    }
    return true;
}