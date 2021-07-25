<div class="box">
    <div class="box-content">
        <div class="box-header">
            <a class="btn" href="javascript:;" onclick="we.reload();"><i class="fa fa-refresh"></i>刷新</a>

            <a style="display:none;" id="j-delete" class="btn" href="javascript:;"
               onclick="we.dele(we.checkval('.check-item input:checked'), deleteUrl);"><i
                    class="fa fa-trash-o"></i>删除</a>

        </div><!--box-header end-->
        <div class="box-table">
            <table class="list">
                <thead>
                <tr>
                    <th class="check"><input id="j-checkall" class="input-check" type="checkbox"></th>
                    <th><?php echo $model->getAttributeLabel('r_name'); ?></th>
                    <th><?php echo $model->getAttributeLabel('r_image'); ?></th>
                    <th><?php echo $model->getAttributeLabel('r_address'); ?></th>
                    <th><?php echo $model->getAttributeLabel('r_price'); ?></th>
                    <th><?php echo $model->getAttributeLabel('r_service'); ?></th>
                    <th><?php echo $model->getAttributeLabel('r_rank'); ?></th>
                    <th><?php echo $model->getAttributeLabel('r_phone'); ?></th>
                    <th>状态</th>
                    <th>菜单</th>
                    </th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($arclist as $v) {
                        $flag = 1;
                        if(($v->r_isupload || $v->r_ispass) == 0){
                    ?>
                    <tr>
                        <td class="check check-item"><input class="input-check" type="checkbox"
                                                            value="<?php echo CHtml::encode($v->id); ?>"></td>

                        <td style='text-align: center;width: 200px;'><?php echo $v->r_name; ?></td>
                        <td style='text-align: center;'><div align="center"><?php echo show_picture($v->r_image); ?></div></td>
                        <td style='text-align: center;'><?php echo $v->r_address; ?></td>
                        <td style='text-align: center;'><?php echo $v->r_price; ?></td>
                        <td style='text-align: center;'><?php echo $v->r_service; ?></td>
                        <td style='text-align: center;'><?php echo $v->r_rank; ?></td>
                        <td style='text-align: center;'><?php echo $v->r_phone; ?></td>
                        <td style='text-align: center;'>
                        <?php if(($v->r_ispass&&$v->r_isupload) == 1) {
                            echo '审核通过';
                        }
                        else if($v->r_ispass == 0 && $v->r_isupload == 1) {
                            $flag = 0;
                            echo '已退回';
                        }
                        else
                        {
                            echo '未审核';
                        }
                        ?>
                        </td>
                        <td style='text-align: center;'>
                            <?php  $dishes = Dish::model()->findALl(array(
                                     'select'=>array('d_rest,d_name'),
                                     'condition'=>'d_rest = :d_rest',
                                     'params'=>array(':d_rest'=>$v->r_name)));
                            foreach( $dishes as $a){?>
                                <?php echo $a->d_name;?>
                                <?php
                                }
                            ?>
                        </td>
                        <td>
                            <a class="btn" href="<?php echo $this->createUrl('update', array('id' => $v->id)); ?>"
                               title="编辑"><i class="fa fa-edit"></i></a>
                            <a class="btn" onClick="return confirm('确定通过?');" href="<?php echo $this->createUrl('pass', array('id' => $v->id)); ?>"
                               title="通过"><i class="fa fa-check"></i></a>
                            <?php if($flag != 0){?>
                            <a class="btn" onClick="return confirm('确定退回?');" href="<?php echo $this->createUrl('return', array('id' => $v->id)); ?>"
                               title="退回"><i class="fa fa-times"></i></a>
                            <?php }?>
                        </td>
                    </tr>
                <?php
                        }
                } ?>
                </tbody>
            </table>
        </div><!--box-table end-->
        <div class="box-page c"><?php $this->page($pages); ?></div>
    </div><!--box-content end-->
</div><!--box end-->

