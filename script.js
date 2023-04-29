const form = document.querySelector(".wrapper form"),
    fullURL = form.querySelector("input"),
    shortenBtn = form.querySelector("button"),
    blurEffect = document.querySelector(".blur-effect"),
    popupBox = document.querySelector(".popup-box"),
    shortenURL = popupBox.querySelector("input"),
    saveBtn = popupBox.querySelector("button");;
form.onsubmit = (e) => {
    e.preventDefault();
}
shortenBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/url-control.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let data = xhr.response;
            if (data.length <= 5) {
                blurEffect.getElementsByClassName.display = "block";
                popupBox.classList.add("show");
                let domain = "localhost:8888/url?u=";
                shortenURL.value = domain + data;

                saveBtn.onclick = () => {
                    location.reload();
                }
            } else {
                alert(data);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}