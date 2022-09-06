<?php
include '../php/connect.php';
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $record = $db->search($input);

?>
<div class="table-responsive" id="no-more-tables">
    <form action="../php/inbox_delete.php" method="POST">
        <table class="table bg-white">
            <?php
                while ($row = mysqli_fetch_assoc($record)) {
                ?>
            <tr>
                <td style="width:5px;">
                    <input type="checkbox" class="checkItem" name="delete_data[]" value="<?php echo $row['Id']; ?>">
                </td>
                <td><?php echo $row['To']; ?>

                <td><?php echo $row['Cc']; ?>
                <td><?php echo $row['Bcc']; ?>
                <td><?php echo $row['Subject']; ?>
                <td><?php echo $row['Msg']; ?>
                <td><?php echo $row['DateTime']; ?>
            </tr>
            <?php
                }
                ?>
            <tbody>
                <tr>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<?php

}
?>