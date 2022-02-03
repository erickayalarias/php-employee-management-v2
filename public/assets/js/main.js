

data= window.location.href
registerView= data.replace("dashboard", "form")

//Data url where i redirect

datatoshowtime =window.location.href

if(datatoshowtime.includes("dashboard")){
    url=datatoshowtime.replace("dashboard", "login")
    console.log(url)
    setInterval(() => {
    $.ajax({
        type: "POST",
        url: `${datatoshowtime}/checkTime`,
        success: function (data) {
            if(data.includes("localhost")){
                swal({
                    title: "Session expired",
                    icon: "warning",
                    buttons: false,
                    dangerMode: true,
                  })
                setTimeout(() => {
                    window.location.assign(`${data}`)
                }, 2000);
               
            }
        }
    })
}, 1000);
}else if(datatoshowtime.includes("form") && datatoshowtime.includes("checked")){
    cambiadata=datatoshowtime.replace("form", "dashboard")
    cammbiadata=cambiadata.replace("checked", "checkTime")
    setInterval(() => {
    $.ajax({
        type: "POST",
        url: `${cammbiadata}`,
        success: function (data) {
            if(data.includes("localhost")){
                swal({
                    title: "Session expired",
                    icon: "warning",
                    buttons: false,
                    dangerMode: true,
                  })
                setTimeout(() => {
                    window.location.assign(`${data}`)
                }, 2000);
               
            }
        }
    })
}, 1000);
    // console.log(cambiadata)
}else if(datatoshowtime.includes("form")){
    newData=datatoshowtime.replace("form", "dashboard")
    setInterval(() => {
    $.ajax({

        type: "POST",
        url: `${newData}/checkTime`,
        success: function (data) {
            if(data.includes("localhost")){
                swal({
                    title: "Session expired",
                    icon: "warning",
                    buttons: false,
                    dangerMode: true,
                  })
                setTimeout(() => {
                    window.location.assign(`${data}`)
                }, 2000);
               
            }
        }
    })
}, 1000);
}

//Jsgrid 

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
        confirmDeleting: false,
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
            $.ajax({
                type: "POST",
                url: `${registerView}/data/${args.item[0]}`,
                data:args.item,
                success: function (data){
                    swal({
                        title: "Employee Updated",
                        icon: "success",
                    });
                }
            });
            
        },
        onItemDeleting: function (args){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this employee",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal("Employee deleted!", {
                    icon: "success",
                  });
                  $.ajax({
                            type: "DELETE",
                            url: `${data}/Delete/${args.item[0]}`,
                            success: function (data) {
                                swal({
                                    title: "Employee Deleted",
                                    icon: "success",
                                });
                            }
                        });
                } else {
                    swal("Employee not deleted!");
                    args.cancel= true;
                    callGrid()
                }
              });
        },

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
                swal({
                    title: "Email incorrect",
                    icon: "warning",
                });
            }

            dataEmployee.forEach(element => {
                if(element.email == args.item.email){ 
                    args.cancel = true;
                    swal({
                        title: "Email already in the database",
                        icon: "warning",
                    });
                }
            });
        },

        //todo event listener to after validations insert the employee in employee.json
        onItemInserted: function (args) {
            route= window.location.href
            $.ajax({
                type: "POST",
                url: `${route}/nep`,
                data: args.item,
                success: function (data) {
                    swal({
                        title: "Employee Added",
                        icon: "success",
                    });
                    callGrid();
                    // console.log(data)
                }
            })
        }
    });

};


//form submit
$( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    //  form= $(this).serializeArray();
     form= $(this).serializeArray();
     // data.includes("checked")
     if(data.includes("checked")){
        //  console.log(form)
        nuevaUrl= data.replace("checked", "data")
         $.ajax({
             type: "POST",
             url: `${nuevaUrl}`,
             data: form,
             success: function (data) {
                 swal({
                    title: "User  Updated!",
                    icon: "success",
                  });
             }
         });
     }else{
        routeAdd=`${data}/add`
        form= $(this).serializeArray();
         $.ajax({
            type: "POST",
            url: `${routeAdd}`,
            data: form,
            success: function (data) {
                datos = data
                if(datos == 100000){
                    swal({
                        title: "User Added",
                        icon: "success",
                      });
                }else{
                    id=data;
                    swal({
                                title: "This email already exist in the Database!",
                                text: "Would you like to go to the employee?",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                              })
                              .then((user) => {
                                if (user) {
                                    url= window.location.href
                                    newUrl=`${url}/checked/${id}`
                                    window.location.assign(newUrl)
                                    console.log(window.location.href)
                                } else {
                                  swal("Change email");
                                }
                              });
                }
            }
        });
     }
    
  });


  function type(n, t) {
     var str = document.getElementsByTagName("code")[n].innerHTML.toString();
     var i = 0;
    document.getElementsByTagName("code")[n].innerHTML = "";
    setTimeout(function() {
        var se = setInterval(function() {
            i++;
            document.getElementsByTagName("code")[n].innerHTML =
                str.slice(0, i) + "|";
            if (i == str.length) {
                clearInterval(se);
                document.getElementsByTagName("code")[n].innerHTML = str;
            }
        }, 10);
    }, t);
}

type(0, 0);
type(1, 600);
type(2, 1300);
