$(document).ready(function() {
    //Getting form data
    $("form").submit(function (e) { 
        e.preventDefault();
        //Check if input is valid
        if($("#username, #first, #last").val() == "")
        {
            $("#alert").show().removeClass("alert-success").addClass("alert-warning").text("All fields are required");
            return false;
        }else{

            $.ajax({
                type: "POST",
                url: "api/userreg-api.php",
                data: $(this).serialize(),
                beforeSend: function (){
                    $("#alert").show().removeClass("alert-warning").addClass("alert-success").text(`Sending request . . .`);
                    console.log("Sending request . . .");
                },
                success: function (response) {
                    if (response[0].message == "User Inserted") {
                        $(".loader").hide();
                        $("#alert").show().removeClass("alert-warning").addClass("alert-success").text(`${response[0].message}`);
                        $("tbody").prepend(`
                        <tr id="tr${response[0].id}">
                            <td>${response[0].first}</td>
                            <td>${response[0].last}</td>
                            <td>${response[0].username}</td>
                            <td>
                                <a href="edit.php?id=${response[0].id}">Edit</a> | 
                                <a href="javascript:void(0)" onclick="delete_user(${response[0].id})">Delete</a>
                            </td>
                        </tr>

                    `).hide().fadeIn();
                    //Clear form field when submitted
                    $("form").trigger("reset");
                    } 
                    else 
                    if(response[0].message == "User already exist") {
                        $("#alert").show().removeClass("alert-success").addClass("alert-warning").text(`${response[0].message}`);
                    }
                    console.log(response);
                }
            });
        }
    });

    //Display user results
    $.ajax({
        type: "GET",
        url: "api/users-api.php",
        success: function (response) {
            $(".loader").hide();
            //Looping through our result
            var count = 1;
            for (let i = 0; i < response.length; i++) {
                 $("tbody").append(`

                    <tr id="tr${response[i].id}">
                        <td>${response[i].first}</td>
                        <td>${response[i].last}</td>
                        <td>${response[i].username}</td>
                        <td>
                            <a href="edit.php?id=${response[i].id}">Edit</a> | <a href="javascript:void(0)" onclick="delete_user(${response[i].id})">Delete</a>
                        </td>
                    </tr>

                 `);
                 count++;
            }
            $('#example').DataTable();
            console.log(response);
        }
    });

} );

//Delete user id
function delete_user(id) {
    
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "api/deleteuser-api.php",
            data: {"id" : id},
            beforeSend: function () {
              console.log("Deleting user . . .");
            },
            success: function (response) {
                console.log(response);
                $(`#tr${id}`).fadeOut();
            }
        });
    });

}