prueba= window.location.href
 //AJAX request
//  httpRequest("http:///employeev2/php-employee-management-v2/" + contentId, function(){
//     console.log(this.responseText);

//     const tbody = document.querySelector("#tbody-contents");
//     const row = document.querySelector("#row-" + contentId);
//     tbody.removeChild(row);

//     document.querySelector("#responseContent").innerHTML = this.responseText;
// });
// $.ajax({
//     type: "POST",
//     url: `${prueba}/getdb`,
//     success: function (data) {
//         console.log(data)
//     }
// })

async function callDataEmploee() {
    let result = []
    try {
        result = await $.ajax({
            type: "POST",
            url: `${prueba}/getdb`,
            success: function (data) {
                // console.log(data)
                $dataEmployee = data;
            }
        })
        return result;
    } catch (error) {
        console.error("Don't load the Data");
    }
};
// console.log(window.location.pathname)
// console.log(window.location.host )
// console.log(window.location.hostname)
// console.log(window.location.href)
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
                            window.location.assign(`./../src/employee.php`)
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
            $.ajax({
                type: "DELETE",
                url: `.././src/library/employeeController.php?delEmployee=${args.item.id}`,
                success: function (data) {
                   alert("The user has been deleted");
                //    callGrid();
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
            window.location.assign(`./../src/employee.php?id=${$idget}`)
        },
       
        onItemInserting: function(args) {
            emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (!emailRegex.test(args.item.email)) {
                args.cancel = true;
                alert(`The email: ${args.item.email} is incorrect`);
            }

            $dataEmployee.forEach(element => {
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
                    callGrid();
                }
            })
        }
    });

};
