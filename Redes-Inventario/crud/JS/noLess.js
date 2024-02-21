document.addEventListener("DOMContentLoaded",function(){
    var noLess = document.querySelectorAll('input[type="number"][name="cant2"]');
    noLess.forEach(input => {
    input.addEventListener("input",function(){
        var currentValue = parseInt(input.value);
        if (currentValue < 0) {
            input.value = 0;
        }
    });
});
});