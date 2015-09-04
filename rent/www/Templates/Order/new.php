<script>

    $(document).ready(function(){
        apartmentLoad();

        $("button[name=send]").click(function() {
            $.ajax({
                type:       'POST',
                url:        '/order/create',
                dataType:   'json',
                data:       'email=' + $("#inputEmail").val() + "&" +
                            'name=' + $("#inputName").val() + "&" +
                            'apartmentId=' + $("#inputApartment").val() + "&" +
                            'comment=' + $("#inputComment").val(),
                success:    function(response){
                    $(".messages").empty();
                    if (response.status == 1) {
                        $(".messages").append(getMessage("success", "Order created."));
                    } else {
                        dump(1);
                        $.each(response.messages, function(id, message) {
                            $(".messages").append(getMessage("danger", message));
                        })
                    }
                }
            });
        });
    });

</script>

<div class="col-md-8">
    <div class="messages"></div>
    <form role="form">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="inputApartment">Apartment</label>
            <select type="select" class="form-control placeholder" id="inputApartment">
                <option value="">Select apartment</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputComment">Comment</label>
            <textarea class="form-control" rows="4" id="inputComment"></textarea>
        </div>
        <button type="button" class="btn btn-default" name="send">Send</button>
    </form>
</div>