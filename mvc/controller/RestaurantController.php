<?php


class RestaurantController extends BaseController {

    protected $model = '';

    public function init() {
        $this->model = substr(__CLASS__, 0, -10);
        parent::init();
        //dump(Yii::app()->request->isPostRequest);
    }


    public function actionDelete($id) {
        parent::_clear($id);
    }


    public function actionCreate() {
        $modelName = $this->model;
        $model = new $modelName('create');
        $data = array();
        if (!Yii::app()->request->isPostRequest) {
            $data['model'] = $model;
            $this->render('update', $data);
        } else {
            $this->saveData($model, $_POST[$modelName]);
        }
    }
    public function actionUpload($id,$keywords = '') {
        $tmp=Restaurant::model()->find('id = '.$id);
        $tmp->r_isupload='0';
        $tmp->r_ispass='1';
        $tmp->save();
        $this->actionRest($keywords);
    }

    public function actionPass($id,$keywords = '') {
        $tmp=Restaurant::model()->find('id = '.$id);
        $tmp->r_isupload='1';
        $tmp->r_ispass='1';
        $tmp->save();
        $this->actionIndex($keywords);
    }
    public function actionReturn($id,$keywords = '') {
        $tmp=Restaurant::model()->find('id = '.$id);
        $tmp->r_isupload='1';
        $tmp->r_ispass='0';
        $tmp->save();
        $this->actionIndex($keywords);
    }
    public function actionUpdate($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('update', $data);
        } else {
            $this->saveData($model, $_POST[$modelName]);
        }
    }
    public function actionChange($id) {
        $modelName = $this->model;
        $model = $this->loadModel($id, $modelName);
        $model->r_ispass = '0';
        $model->r_isupload = '0';
        if (!Yii::app()->request->isPostRequest) {
            $data = array();
            $data['model'] = $model;
            $this->render('change', $data);
        } else {
            $this->saveData($model, $_POST[$modelName]);
        }
    }
    public function actionStation($rest)
    {
        $_SESSION['rest'] = $rest;
        $this->redirect(array('/dish/user'));
    }

    function saveData($model, $post) {
        $model->attributes = $post;
        show_status($model->save(), '????????????', get_cookie('_currentUrl_'), '????????????');
    }

    //????????????
    public function actionIndex($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria -> condition = get_like('1','r_name,r_address',$keywords);
        $criteria -> condition = get_like( $criteria -> condition,'r_name,r_address',$keywords);

        $data = array();
        parent::_list($model, $criteria, 'index', $data);
    }


    public function actionUser($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria -> condition = get_like('1','r_name,r_address',$keywords);
        $criteria -> condition = get_like( $criteria -> condition,'r_name,r_address',$keywords);

        $data = array();
        parent::_list($model, $criteria, 'user', $data);
    }

    public function actionRest($keywords = '') {
        set_cookie('_currentUrl_', Yii::app()->request->url);
        $modelName = $this->model;
        $model = $modelName::model();
        $criteria = new CDbCriteria;
        $criteria -> condition = get_like('1','r_name,r_address',$keywords);
        $criteria -> condition = get_like( $criteria -> condition,'r_name,r_address',$keywords);

        $data = array();
        parent::_list($model, $criteria, 'rest', $data);
    }
}