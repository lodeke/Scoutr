<?php
use \yii\bootstrap\ActiveForm;
$this->title = "FAQ Edit";
?>
<div class="col-lg-6 ml-auto mr-auto">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <small class="text-info text-capitalize" >
                  <b>Q.  <?php echo  $model['question']; ?></b>
                </small>

            </div>
        </div>
        <?php $form = ActiveForm::begin([
            'action' => ['edit/edit-faq?id='.$model['id']],
            'options' => ['id' => 'edit_faqt_form','class' => 'master-form']
        ]); ?>

        <div class="card-body">
            <?php echo  $form->field($model, 'question');;  ?>
            <?php echo  $form->field($model, 'answer')->textarea(['row'=>5]) ?>

        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="<?php echo  \yii\helpers\Url::toRoute('settings/faq-delete/'.$model['id']) ?>" class="btn btn-danger">Delete</a>
            <a href="<?php echo  \yii\helpers\Url::toRoute('settings/faq') ?>" class="btn btn-info">Back</a>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
