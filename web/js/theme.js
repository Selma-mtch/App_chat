function changeTheme(color) {
    const body = document.body;
    const bodyElement = document.querySelector('body');
    switch (color) {
        case 'blanc':
            body.style.backgroundColor = '#ffffff';
            body.style.color = '#000000';
            break;
        case 'noir':
            body.style.backgroundColor = '#000000';
            body.style.color = '#ffffff';
            body.main.section.a.div.h2.color = '#2ecc71'
            break;
        case 'bleu':
            body.style.backgroundColor = '#3498db';
            body.style.color = '#ffffff';
            break;
        case 'rouge':
            body.style.backgroundColor = '#e74c3c';
            body.style.color = '#ffffff';
            break;
        case 'vert':
            body.style.backgroundColor = '#2ecc71';
            body.style.color = '#ffffff';
            break;
        case 'gris':
            body.style.backgroundColor = '#95a5a6';
            body.style.color = '#000000';
            break;
        case 'violet':
            body.style.backgroundColor = '#9b59b6';
            body.style.color = '#ffffff';
            break;
        case 'rose':
            body.style.backgroundColor = '#ff6f91';
            body.style.color = '#ffffff';
            break;
        case 'jaune':
            body.style.backgroundColor = '#f1c40f';
            body.style.color = '#000000';
            break;
        case 'marron':
            body.style.backgroundColor = '#8e5c42';
            body.style.color = '#ffffff';
            break;
        case 'defaut':
            body.style.backgroundColor = '#ecf0f1';
            body.style.color = '#2c3e50';
            break;
        default:
            console.error('Couleur inconnue:', color);
    }
    localStorage.setItem('themeColor', color); // Stocker la couleur dans localStorage
}

// Appliquer le thème enregistré au chargement de la page
document.addEventListener('DOMContentLoaded', () => {
    const savedColor = localStorage.getItem('themeColor');
    if (savedColor) {
        changeTheme(savedColor);
    }
});
