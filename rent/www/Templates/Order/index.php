<div class="col-md-8">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>User</th>
            <th>Apartment</th>
            <th>Address</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($parameters["data"] as $order) {
            echo "<tr>";
            echo "<td>" . $order['userName'] . "</td>";
            echo "<td>" . $order['apartmentName'] . "</td>";
            echo "<td>" . $order['address'] . "</td>";
            echo "<td>" . $order['created'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>