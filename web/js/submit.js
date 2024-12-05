let submit=document.getElementById('submit');

submit.addEventListener('mouseover', opacité0 );
submit.addEventListener('mouseout',opacité1);

function opacité0(event) {
    if (event){this.style.opacity=0.5;}
    else{this.style.opacity=1;}
};

function opacité1(event) {
    if (event){this.style.opacity=1;}
    else{this.style.opacity=0;}
};