<?php
include '../php/connect.php';

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $record = $db->search_index($input);

?>
<div class="table-responsive" id="no-more-tables">
    <form>
        <table class="table bg-white">
            <?php
                while ($row = mysqli_fetch_assoc($record)) {

                ?>
            <tr>
                <td style="width:5px;">
                    <input type="checkbox" class="checkItem" name="delete_data[]" value="<?php echo $row['Id']; ?>">
                </td>
                <?php if ('Send_delete' == 1)  ?>
                <td><?php echo $row['To']; ?>

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