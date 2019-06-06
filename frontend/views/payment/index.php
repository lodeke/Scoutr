<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 17-03-2016
 * Time: 14:58
 */

$notifyUrl = $rerunUrl;
?>
<style type="text/css">
    <!--
    .style1 {
        font-size: 14px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    -->
</style>
<form name="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="<?php echo  $paypalAddress;?>">
    <input type="hidden" name="item_name" value="Deposit into <?php echo  $item_name; ?>">
    <input type="hidden" name="amount" value="<?php echo  $amount; ?>">
    <input type="hidden" name="custom" value="<?php echo  $type; ?>">
    <input type="hidden" name="return" value="<?php echo  $rerunUrl ?>">
    <input type="hidden" name="notify_url" value="<?php echo  $notifyUrl; ?>">
    <input type="hidden" name="currency_code" value="USD">
</form>
<div class="container">
    <div class="row">
        <div class="col-lg-12" align="center">
            <br><br><br><br><br><br><br><br>
            <h3 style="font-family: roboto-bold;color:#999">
                Veilige betaling met
            </h3>
            <br>
            <p>
                <img src="<?php echo  Yii::getAlias('@web') ?>/images/site/paypal.png" class="img-responsive" width="250px;">
            </p>
            <div align="center" style="padding: 150px;padding-top: 50px;display: block;position: relative">
 U overbrengen naar het beveiligde betalingssysteem van Paypal.com, als u niet op de hoogte bent

                <a href="javascript:document.paypal.submit();">Klik hier</a>
            </div>
        </div>
    </div>
</div>