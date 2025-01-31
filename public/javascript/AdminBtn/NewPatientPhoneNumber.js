document.getElementById("MyNumber").addEventListener('input', function() {
    let PhoneValue = this.value;
    
    if (PhoneValue.startsWith('9')||PhoneValue.startsWith('8')||PhoneValue.startsWith('7')||PhoneValue.startsWith('6')
    ||PhoneValue.startsWith('5')||PhoneValue.startsWith('4')||PhoneValue.startsWith('3')||PhoneValue.startsWith('2')||
    PhoneValue.startsWith('1')) {
        PhoneValue = '+63' + PhoneValue.substring(0);
    } else if(PhoneValue.startsWith('0')){
        PhoneValue = '+63' + PhoneValue.substring(1);
    }
        this.value = PhoneValue;
        console.log(PhoneValue);
        displayDOM(PhoneValue);
});