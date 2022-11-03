// coding with nick

const inputs = document.querySelectorAll(".input");

function addcl(){
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl(){
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove("focus");
    }
   
}

inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl)
});


// See Password

function show() {
    var pswrd = document.getElementById('pswrd');
    var icon = document.querySelector('.fas');
    if (pswrd.type === "password") {
        pswrd.type = "text";
        icon.style.color = "#4dd8f3";
    } else{
        pswrd.type = "password";
        icon.style.color = "#d9dde4";
    }


}





