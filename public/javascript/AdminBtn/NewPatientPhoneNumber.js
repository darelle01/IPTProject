document.getElementById("MyNumber").addEventListener('input', function () {
    let PhoneValue = this.value.replace(/[^0-9+]/g, '');
    
    // Ensure only one "+" at the start
    if (PhoneValue.includes('+')) {
        PhoneValue = '+' + PhoneValue.replace(/\+/g, ''); 
    }

    // Ensure it starts with +63
    if (PhoneValue.startsWith('0')) {
        PhoneValue = '63' + PhoneValue.substring(1); 
    }
    
    if (!PhoneValue.startsWith('63') && !PhoneValue.startsWith('+63')) {
        PhoneValue = '63' + PhoneValue.replace(/^\+/, ''); 
    }

    this.value = '+' + PhoneValue.replace(/^\+*/, '');
});
