<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Оплата</h4>
            </div>
            <div class="modal-body">
                <div class="pay-modal">
                    <form method="POST" action="https://merchant.webmoney.ru/lmi/payment.asp" accept-charset="windows-1251">
                        <input id="pay_value" type="hidden" name="LMI_PAYMENT_AMOUNT" value="750">
                        <input type="hidden" name="LMI_PAYMENT_DESC" value="Buying phone">
                        <input type="hidden" name="LMI_PAYMENT_NO" value="1">
                        <input type="hidden" name="LMI_PAYEE_PURSE" value="Z155771820786">
                        <input type="hidden" name="LMI_MODE" value="1">
                        <input type="submit" class="submit" value="" background-image="<?php echo plugin_dir_url(__FILE__). '/img/wmlogo_vector_blue.png'; ?>">
                    </form>
                    <!--<img src="<?php echo plugin_dir_url(__FILE__). '/img/wmlogo_vector_blue.png'; ?>">-->
                </div>
                <?php ?>
            </div>
        </div>
    </div>
</div>