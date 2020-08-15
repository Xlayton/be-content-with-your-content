// console.log(document.getElementById('theme-picker').elements);

for(let element of document.getElementById('theme-picker').elements) {
    console.log(element);
    element.onclick = ()=> {
        console.log(element.value);
        document.documentElement.style.setProperty('--background-color', `var(--${element.value}-background)`);
        document.documentElement.style.setProperty('--foreground-color', `var(--${element.value}-foreground)`);
        document.documentElement.style.setProperty('--hover', `var(--${element.value}-hover)`);
        document.documentElement.style.setProperty('--shadow', `var(--${element.value}-shadow)`);
        document.documentElement.style.setProperty('--image', `var(--${element.value}-image)`);
        document.documentElement.style.setProperty('--button-color', `var(--${element.value}-button)`);
    }
}