prueba= window.location.href
 //AJAX request
//  httpRequest("http:///employeev2/php-employee-management-v2/" + contentId, function(){
//     console.log(this.responseText);

//     const tbody = document.querySelector("#tbody-contents");
//     const row = document.querySelector("#row-" + contentId);
//     tbody.removeChild(row);

//     document.querySelector("#responseContent").innerHTML = this.responseText;
// });
$.ajax({
    type: "POST",
    url: `${prueba}/getdb`,
    success: function (data) {
        console.log(data)
        // if (data != "") {
        //     window.location.assign(`./../index.php`)
        // }
    }
})

// console.log(window.location.pathname)
// console.log(window.location.host )
// console.log(window.location.hostname)
// console.log(window.location.href)
