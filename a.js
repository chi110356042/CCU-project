var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


new Vue({
    el: '.modal-content',
    delimiters: ['${', '}'],
    data: {
        mail: "",
        pasd: "",
        nomail: false,
        nopasd: false
    },
    methods: {
        clickme: function (mail, pasd) {

            if (this.mail == "" && this.pasd != "") {
                this.nomail = true
                event.preventDefault();
                alert("缺少電子郵件")

            }
            else if (this.mail == "" && this.pasd == "") {
                alert("缺少電子郵件")
                event.preventDefault();
                this.nomail = true

            }
            else if (this.mail != "" && this.pasd == "") {
                alert("這個使用者名稱沒有任何帳號")
                event.preventDefault();
                this.nopasd = true

            }
            else {
                alert("登入成功！")

            }

        }

    }
})

