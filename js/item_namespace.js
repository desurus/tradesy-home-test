/**
 * Created by okryshch on 12/20/15.
 */

var TRADESYHOMETEST = TRADESYHOMETEST || {};

TRADESYHOMETEST = function(){
    $("#delete_item").on("click", function(){
        if (confirm("Are you sure you want to delete this item?")){
            $.ajax({
                url: window.location.href,
                type: "DELETE",
                success: function(data) {
                    console.log(data.result);
                    if (data.result == "success") {
                        $("#item_page").empty();
                        $("<div class='alert alert-success' role='alert'>Item has been successfully deleted.</div>").appendTo("#item_page");
                        $("<a class='btn btn-primary' href='/' role='button'>Back to Home</a>").appendTo("#item_page");
                    }
                },
                error: function(xhr, status, err) {
                    console.error(status, err.toString());
                }
            });
        }
        return false;
    });
}();