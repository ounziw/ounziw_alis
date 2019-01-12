<div class="form-group">
    <?php  echo  $form->label('user_id', t('User ID')) ?>
    <?php  echo  $form->text('user_id', $user_id, array('maxlength' => 40)) ?>
</div>

<div class="form-group">
    <?php  echo  $form->label('numlimit', t('Number of Articles. (1-20)')) ?>
    <?php  echo  $form->number('numlimit', $numlimit, array('min' => 1, 'max' => 20)) ?>
</div>
