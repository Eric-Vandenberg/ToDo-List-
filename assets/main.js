$('document').ready(function(){
    $("#save_task").click(function(){

        var todoadd = $("#todo-add");
        var form_data={
            title:todoadd.find("input[name=title]").val(),
            date:todoadd.find("input[name=date]").val(),
            details:todoadd.find("textarea[name=details]").val(),
        }
        $.ajax(
        {
            url: 'actions/add.php',
            data: form_data,
            //dataType: 'json',
            cache: false,
            method: 'POST',
            error: function () {
                alert("Error!");
            },
            success: function(data){
                //success is achieved!
                console.log("Added!");
            }
        });
        $("#display_refresh").click();
            
    });
    $("#display_refresh").click(function(){

        $.ajax(
        {
            url: 'actions/get.php',
            //dataType: 'text',
            cache: false,
            method: 'POST',
            error: function () {
                alert('Get Error');
            },
            success: function(data){

                    $(".todo-list").html(data);
            }
        });
            
    });
    $display = $(".container");
    
    $display.on('click', '.todo-record', function() {
        if($(this).hasClass('highlight')) 
        {
            $(this).removeClass('highlight');
            if(document.querySelector('.highlight')==null)
            {
                $('#update_list').hide('slow');
            }
        } 
        else
        {
            $(this).addClass('highlight');
            $('#update_list').show('slow');
        }
    });
    $("#update_list").click(function(){
        var itemsToDelete = [];
        $('.highlight').each(function(){
            console.log('this data-id',$(this).attr('data-id'));
            itemsToDelete.push($(this).attr('data-id'));
        });
            var deleteObject = {'data_id' : itemsToDelete};
            $.ajax(
                {
                    url: 'actions/remove.php',  //get our data from the get.php file
                    data: deleteObject,
                    dataType: 'json', //expect json data back from get.php
                    cache: false, //do not cache the result
                    method: 'POST',  //use the post method
                    success: function(data){  //do something when we get data back
                        console.log("success");
                        $('.highlight').remove();
                        $('#update_list').hide('slow');
                    },
                    error: function(){
                        console.log("did not work");
                    }
            });  
    });
});















































