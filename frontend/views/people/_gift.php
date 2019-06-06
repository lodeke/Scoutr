<?php
$coin = \common\models\Point::getPoint();
?>
<div class="modal fade in" id="giftModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <input type="hidden" id="gift-send-url" value="<?= \yii\helpers\Url::toRoute('encounter/gift-send') ?>">
                <input type="hidden" id="gift-model-url" value="<?= \yii\helpers\Url::toRoute('encounter/gift-load') ?>">
                <input type="hidden" id="gift-model-point" value="<?= $coin; ?>">

                <div class="row no-gutters mb-3">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <img id="gift-model-user-img" src="<?= Yii::getAlias('@web') ?>/images/users/dem_girl.jpg" class="card-img-top">
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
                        <div class="card-body">
                            <h2>
                                Stuur geschenk naar <span class="text-primary" id="gift-model-user-name">Radhika</span>?
                            </h2>

                            <p class="card-text">
                               Selecteer een geschenk uit de onderstaande geschenklijst.
                            </p>
                            <h4>
                                Your Coin <span class="text-primary" id="gift-model-remain-coin"><?= $coin; ?></span> /-
                            </h4>
                            <a class="text-white btn btn-xs bg-green" style="font-size: 11px;font-weight: 500" href="<?= \yii\helpers\Url::toRoute('vip/coin') ?>">Koop meer</a>
                        </div>
                    </div>
                    <div class="col-4">

                        <div class="card ">

                            <div class="card-body"  align="center">
                                <img  style="height: 80px;" src="" id="gift-model-gift-preview">
                                <h4 class="card-title" id="gift-model-gift-preview-name">Selecteer cadeau</h4>
                                <p class="card-text">
                                    Gift Charge <span id="gift-model-gift-preview-charge"> nul</span>
                                </p>
                                <input type="hidden" id="gift-model-user-id" value="">
                                <input type="hidden" id="gift-sent-id" value="">

                                <button class="btn btn-xs bg-green text-white sendGiftNow">Stuur <i class="la la-send-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-12">
                        <div class="row" id="gift-model-content">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer no-bd">

            </div>
        </div>
    </div>
    <!--            model add row closed-->
</div>
