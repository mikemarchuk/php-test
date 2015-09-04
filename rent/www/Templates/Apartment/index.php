<script>

    $(document).ready(function(){
        userLoad();

        $("button[name=send]").click(function() {
            var apartmentsTable = $("#apartments");

            $.ajax({
                type:       'POST',
                url:        '/apartment/getByUserId',
                dataType:   'json',
                data:       'userId=' + $("#inputUser").val(),
                success:    function(apartments){
                    apartmentsTable.empty();
                    $.each(apartments, function(id, apartment) {
                        apartmentsTable.append(getTableRow(apartment));
                    });
                }
            });
        });
    });

</script>

<div class="col-md-8">
    <form role="form">
        <div class="form-group">
            <label for="inputUser">User</label>
            <select type="select" class="form-control placeholder" id="inputUser">
                <option value="">Select user</option>
            </select>
        </div>
        <button type="button" class="btn btn-default" name="send">Send</button>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
        </tr>
        </thead>
        <tbody id="apartments">
        <?php
            foreach($parameters["data"] as $apartment) {
                echo "<tr>";
                echo "<td>" . $apartment['name'] . "</td>";
                echo "<td>" . $apartment['address'] . "</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>