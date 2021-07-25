<div class="box">
    <div class="box-title c"><h1><i class="fa fa-table"></i>单位信息</h1><span class="back"><a class="btn"
                                                                                           href="javascript:;"
                                                                                           onclick="we.back();"><i
                        class="fa fa-reply"></i>返回</a></span></div><!--box-title end-->
    <div class="box-detail">
        <?php $form = $this->beginWidget('CActiveForm', get_form_list()); ?>
        <div class="box-detail-tab">
            <ul class="c">
                <li class="current">基本信息</li>
            </ul>
        </div><!--box-detail-tab end-->
        <div class="box-detail-bd">
            <div style="display:block;" class="box-detail-tab-item">
                <table>
                    <tr class="table-title">
                        <td colspan="2">申请信息</td>
                    </tr>
                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'eval_rest'); ?></td>
                        <td width="30%">
                            <?php echo $form->textField($model, 'eval_rest', array('class' => 'input-text','value'=>$_SESSION['rest'],'readonly'=>"readonly",'style'=>"border-style:none",)); ?>
                            <?php echo $form->error($model, 'eval_rest', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td width="30%"><?php echo $form->labelEx($model, 'eval_dish'); ?></td>
                        <td width="30%">
                            <?php echo $form->textField($model, 'eval_dish', array('class' => 'input-text', 'value'=>$_SESSION['dish'])); ?>
                            <?php echo $form->error($model, 'eval_dish', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'eval_time'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'eval_time', array('class' => 'input-text','readonly'=>"readonly",'value'=>date('Y-m-d', time()))); ?>
                            <?php echo $form->error($model, 'eval_time', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'eval_star'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'eval_star', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'eval_star', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'eval_image'); ?></td>
                        <td width="30%">
                            <?php echo $form->hiddenField($model, 'eval_image', array('class' => 'input-text fl')); ?>
                            <?php echo show_pic($model->eval_image,get_class($model).'_'.'eval_image')?>
                            <script>we.uploadpic('<?php echo get_class($model);?>_eval_image', 'jpg');
                            </script>
                            <?php echo $form->error($model, 'eval_image', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'eval_content'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'eval_content', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'eval_content', $htmlOptions = array()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?php echo $form->labelEx($model, 'evaluator'); ?></td>
                        <td>
                            <?php echo $form->textField($model, 'evaluator', array('class' => 'input-text')); ?>
                            <?php echo $form->error($model, 'evaluator', $htmlOptions = array()); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div><!--box-detail-tab-item end   style="display:block;"-->

    </div><!--box-detail-bd end-->



    <div class="box-detail-submit">
        <button onclick="submitType='baocun'" class="btn btn-blue" type="submit">保存</button>
        <button class="btn" type="button" onclick="we.back();">取消</button>
    </div>

    <?php $this->endWidget(); ?>
</div><!--box-detail end-->
</div><!--box end-->



