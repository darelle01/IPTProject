document.getElementById("MyBirthDate").addEventListener('input', function() {
    var birthDateValue = new Date(this.value);
    var currentDate = new Date();
    
    var ageDifferenceMilliseconds = currentDate - birthDateValue;
    var ageDate = new Date(ageDifferenceMilliseconds);

    var ageYears = ageDate.getUTCFullYear() - 1970; 
    document.getElementById("MyAge").value = ageYears;
});
