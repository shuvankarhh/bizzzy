let toggleFoooterIcon = (e) => {
    let child = e.querySelector('.fas');
    console.log(child)
    child.classList.toggle('active');
}

// Question One

let questionSelect = (val, link) => {
    alert(val);
    location.href=link
}