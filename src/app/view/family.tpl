<?php require_once 'header.tpl' ?>

<table class="table">
    <thead>
        <tr>
            <th width="20%">SURNAME</th>
            <th width="20%">#MEMBERS</th>
            <th width="20%">FATHER</th>
            <th width="20%">MAXAGE</th>
            <th width="20%">CHILDREN</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($families as $family) { ?>
            <tr>
                <td><?=$family['surname']?></td>
                <td><?=$family['member']?></td>
                <td><?=$family['father']?></td>
                <td><?=$family['maxage']?></td>
                <td><?=$family['children']?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4">Total</td>
            <td><?= $families[0]['total_member'] ?></td>
        </tr>
    </tbody>
</table>

<?php require_once 'footer.tpl' ?>