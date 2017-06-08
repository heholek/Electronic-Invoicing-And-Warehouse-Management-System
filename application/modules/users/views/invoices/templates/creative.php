<div class="invoice-creative">
    <div class="row-my-firm">
        <?php if ($invoice['firm']['image'] != null) { ?>
            <div class="firm-logo">
                <img src="<?= base_url('attachments/companiesimages/' . $invoice['firm']['id'] . '/' . $invoice['firm']['image']) ?>" alt="">
            </div>
        <?php } ?>
        <div class="my-firm-info">
            <p class="firm-name"><?= $invoice['firm']['name'] ?></p>
            <p><?= $invoice['firm']['address'] ?></p>
            <p><?= $invoice['firm']['city'] ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row-invoice-info">
        <?php
        if ($invoice['inv_type'] == 'tax_inv') {
            $inv_type = $invoice['translation']['invoice'];
        }
        if ($invoice['inv_type'] == 'prof') {
            $inv_type = $invoice['translation']['pro_forma'];
        }
        if ($invoice['inv_type'] == 'debit') {
            $inv_type = $invoice['translation']['debit_note'];
        }
        if ($invoice['inv_type'] == 'credit') {
            $inv_type = $invoice['translation']['credit_note'];
        }
        ?>
        <span class="invoice-type"><?= $inv_type ?></span>
        <div class="info">
            <table>
                <tr>
                    <td class="head-td">
                        <?= $invoice['translation']['number'] ?>
                    </td>
                    <td>
                        <b><?= $invoice['inv_number'] ?></b>
                    </td>
                </tr>
                <tr>
                    <td class="head-td">
                        <?= $invoice['translation']['date_of_issue'] ?>
                    </td>
                    <td>
                        <?= date('d.m.Y', $invoice['date_create']) ?>
                    </td>
                </tr>
                <tr>
                    <td class="head-td">
                        <?= $invoice['translation']['a_date_of_a_tax_event'] ?>
                    </td>
                    <td>
                        <?= date('d.m.Y', $invoice['date_tax_event']) ?>
                    </td>
                </tr>
                <tr>
                    <td class="head-td">
                        <?= $invoice['translation']['amount'] ?>
                    </td>
                    <td>
                        <?= $invoice['final_total'] . ' ' . $invoice['inv_currency'] ?>
                    </td>
                </tr>
            </table>
            <div class="client-info">
                <p><b><?= $invoice['client']['client_name'] ?></b></p>
                <?php if ($invoice['client']['is_to_person'] == 0) { ?>
                    <p><?= $invoice['client']['client_bulstat'] ?></p>
                <?php } else { ?>
                    <?= $invoice['client']['client_ident_num'] ?>
                <?php } if ($invoice['client']['client_vat_registered'] == 1) { ?>
                    <p><?= $invoice['client']['vat_number'] ?></p>
                <?php } ?>
                <p><?= $invoice['client']['client_address'] ?></p>
                <p><?= $invoice['client']['client_city'] ?></p>
                <p><?= $invoice['client']['client_country'] ?></p>
                <?php if ($invoice['client']['is_to_person'] == 0) { ?>
                    <p><?= $invoice['client']['accountable_person'] ?></p> 
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <table class="table table-striped items-table">
        <thead>
            <tr>
                <th><?= $invoice['translation']['products_name'] ?></th>
                <th><?= $invoice['translation']['quantity'] ?></th>
                <th class="text-right"><?= $invoice['translation']['single_price'] ?></th>
                <th class="text-right"><?= $invoice['translation']['value'] ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoice['items'] as $item) { ?>
                <tr>
                    <td class="item-name"><?= $item['name'] ?></td>
                    <td><?= $item['quantity'] . ' ' . $item['quantity_type'] ?></td>
                    <td class="text-right"><?= $item['single_price'] . ' ' . $invoice['inv_currency'] ?></td>
                    <td class="text-right"><?= $item['total_price'] . ' ' . $invoice['inv_currency'] ?></td>
                </tr> 
            <?php } ?>
        </tbody>
    </table>
    <div class="invoice-payments">
        <div class="invoice-totals">
            <table>
                <tr>
                    <td class="info">
                        <?= $invoice['translation']['amount'] ?>
                    </td>
                    <td>
                        <?= $invoice['invoice_amount'] . ' ' . $invoice['inv_currency'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="info">
                        <?= $invoice['translation']['discount'] ?> 
                    </td>
                    <td>
                        <?= $invoice['discount'] . ' ' . $invoice['discount_type'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="info">
                        Tax base 
                    </td>
                    <td>
                        <?= $invoice['tax_base'] . ' ' . $invoice['inv_currency'] ?>
                    </td>
                </tr>
                <tr class="final-total">
                    <td class="info">
                        <?= $invoice['translation']['everything'] ?>  
                    </td>
                    <td class="total-price">
                        <?= $invoice['tax_base'] . ' ' . $invoice['inv_currency'] ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="invoice-payment">
            <p><?= $invoice['translation']['payment_type'] ?>:</p>
            <p><?= $invoice['payment_method'] ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="recipient">
        <p class="rec"><?= $invoice['translation']['recipient'] ?>: 
            <b>
                <?php if ($invoice['client']['is_to_person'] == 0) { ?>
                    <?= $invoice['client']['recipient_name'] ?>
                <?php } else { ?>
                    <?= $invoice['client']['client_name'] ?>
                <?php } ?>
            </b>
        </p>
        <p class="comp"><?= $invoice['translation']['compiled'] ?>: <?= $invoice['composed'] ?></p>
        <div class="clearfix"></div>
    </div>
    <div class="signature">
        <p class="sign"><?= $invoice['translation']['signature'] ?>: ..................</p>
        <p class="cipher"><?= $invoice['translation']['schiffer'] ?>: <?= $invoice['schiffer'] ?></p>
        <div class="clearfix"></div>
    </div>
    <div class="remarks">
        <p><?= $invoice['translation']['remarks'] ?>:</p>
        <p><?= $invoice['remarks'] ?></p>
    </div>
</div>