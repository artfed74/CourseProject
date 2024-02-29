document.addEventListener('DOMContentLoaded', function() {
    const inputField = document.querySelector('textarea[name="comment"]');
    const charactersSpan = document.querySelector('span');
    
    const maxLength = 100; // Максимальное количество символов

    inputField.addEventListener('input', function() {
        const currentLength = inputField.value.length;
        const remainingCharacters = maxLength - currentLength;

        charactersSpan.textContent = `Осталось ${remainingCharacters} символов`;

        if (remainingCharacters < 0) {
            inputField.value = inputField.value.slice(0, maxLength); 
            charactersSpan.textContent = 'Превышен лимит символов';
        }
    });

    const form = document.querySelector('.form_feedback');
    const successMessage = document.getElementById('successMessage');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch('feedback.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                
                successMessage.style.display = 'block';
                successMessage.style.fontSize = '20px';
                successMessage.style.marginTop='15px';


              
                setTimeout(function() {
                    successMessage.style.display = 'none';
                    form.reset();
                }, 3000);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});