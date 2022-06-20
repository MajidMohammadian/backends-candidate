<?php require_once 'header.tpl' ?>

<table class="table">
    <thead>
        <tr>
            <th width="33.3%">Address</th>
            <th width="33.3%">Street</th>
            <th width="33.3%">Other</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($addresses as $address) { ?>
            <tr>
                <td style="text-align: center"><?=$address[0]?></td>
                <td style="text-align: center"><?=$address[1]?></td>
                <td style="text-align: center"><?=$address[2]?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once 'footer.tpl' ?>