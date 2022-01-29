data= window.location.href
console.log(data)
// $.ajax({
//     type: "POST",
//     url: `${data}/getdb`,
//     success: function (data) {
//         dataEmployee = JSON.parse(data);
//     }
// })
// console.log("pepe")
// console.log(window.location.pathname)
// console.log(window.location.host )
// console.log(window.location.hostname)
// reading= await $.ajax({
//     type: "POST",
//     url: `${data}/getdata`,
//     success: function (data) {
//         console.log(data)
//         let datsa=data 
//         return datsa
//         // dataEmployee = JSON.parse(data);
//     }
// })
registerView= data.replace("main", "nuevo")
// console.log(registerView)
// console.log(window.location)



async function callDataEmploee() {
    let result = []
    try {
        result = await $.ajax({
            type: "POST",
            url: `${data}/getdb`,
            success: function (data) {
                dataEmployee = JSON.parse(data);
            }
        })
        return JSON.parse(result);
    } catch (error) {
        console.error("Don't load the Data");
    }
};




async function callGrid() {
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "900px",
        //todo settings JsGrid
        inserting: true,
        editing: true,
        sorting: true,
        autoload: true,
        paging: true,
        pageSize: 20,
        pageButtonCount: 5,
        confirmDeleting: true,
        deleteConfirm: 'Do you really Want DELETE THIS DATA? ',

        //todo Load data from employees.json
        data: await callDataEmploee(),

        //todo fields to display in the table, settings and validators in the table
        fields: [
            { name: "name", type: "text", validate: { validator: "required", message: "Name required" } },
            { name: "email", type: "text", width: 220, validate: { validator: "required", message: "Email required" } },
            { name: "city", type: "text", validate: { validator: "required", message: "City" } },
            { name: "streetAddress", type: "number", validate: { validator: "required", message: "Street Adress required" } },
            { name: "state", type: "text", validate: { validator: "required", message: "State required" } },
            { name: "age", type: "number", width: 50, validate: { validator: "range", param: [18, 80] } },
            { name: "postalCode", type: "number", validate: { validator: "required", message: "Postal code required" } },
            { name: "phoneNumber", type: "number", validate: { validator: "required", message: "phone Number required" } },

            // todo controls settings to event listeners
            {
                type: "control",
                modeSwitchButton: true,
                editButton: true,
                rowClick: true,
                rowDoubleClick: true,

                //todo header button and function
                headerTemplate: () => {
                    return $("<button>").attr("type", "button").attr('class', "fas fa-user-plus")
                        .on("click", function () {
                            window.location.assign(`${registerView}`)
                        });
                }
            },
        ],
        //todo event listener to update from inline table
        onItemUpdated: function (args) {
            //console.log(args.item);
            $.ajax({
                type: "POST",
                url: ".././src/library/employeeController.php?modifyEmployee",
                data: args.item,
                success: function (data) {
                    console.log(data)
                    alert(`The user has been Updated`);
                }
            })

        },
        onItemDeleted: function(args) {
            console.log(args.item[0])
            $.ajax({
                type: "DELETE",
                url: `${data}/Delete/${args.item[0]}`,
                success: function (data) {
                   alert("The user has been deleted");
                }
            });
        }
        ,

        //todo this need to be active to works double click
        rowClick: function (args) {
        },

        //todo event listener to redirect to employee.php with id and charge all data in the form
        rowDoubleClick: function (args) {
            $idget = args["item"].id
            window.location.assign(`${registerView}/checked/${$idget}`)
        },
       
        onItemInserting: function(args) {
            emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (!emailRegex.test(args.item.email)) {
                args.cancel = true;
                alert(`The email: ${args.item.email} is incorrect`);
            }

            dataEmployee.forEach(element => {
                if(element.email == args.item.email){ 
                    args.cancel = true;
                    alert("Email already in the database");
                }
            });
        },

        //todo event listener to after validations insert the employee in employee.json
        onItemInserted: function (args) {
            $.ajax({
                type: "POST",
                url: ".././src/library/employeeController.php?addEmployee",
                data: args.item,
                success: function (data) {
                    // callGrid();
                }
            })
        }
    });

};

rr=document.getElementsByClassName("p")
console.log($("form").serializeArray())
metiendodatos= $("form").serializeArray()

$( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    //  form= $(this).serializeArray();
     form= $(this).serializeArray();
     // data.includes("checked")
     if(data.includes("checked")){
         console.log("pepe")
        nuevaUrl= data.replace("checked", "data")
         $.ajax({
             type: "POST",
             url: `${nuevaUrl}`,
             data: form,
             success: function (data) {
                 console.log(data)
             //    alert("The user has been deleted");
             }
         });
     }else{
         console.log("archivonuevo")

     }
    
  });