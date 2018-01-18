<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Datakos */

$this->title = 'Create Datakos';
$this->params['breadcrumbs'][] = ['label' => 'Datakos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datakos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
