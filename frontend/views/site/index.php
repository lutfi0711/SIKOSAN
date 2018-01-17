<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'SIKOSAN';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang</h1>

        <p class="lead">SIKOSAN - Sistem Informasi Kos-Kos an</p>

        <p>
            <?= 
                Html::a(
                            '<i class="glyphicon glyphicon-search"></i> Mulai Cari', 
                            ['/site/index'], 
                            ['class'=>'btn btn-lg btn-success']
                        ) 
            ?>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6" align="center">
                <h2>Pemilik Kos</h2>

                <p></p>

                <p>
                    <?= 
                        Html::a(
                                    '<i class="glyphicon glyphicon-log-in"></i> Sign Up', 
                                    ['/site/signup'], 
                                    ['class'=>'btn btn-lg btn-primary']
                                ) 
                    ?>
                </p>
            </div>
            <div class="col-lg-6" align="center">
                <h2>Customer</h2>

                <p></p>

                <p>
                    <?= 
                        Html::a(
                                    '<i class="glyphicon glyphicon-log-in"></i> Sign Up', 
                                    ['/site/signup'], 
                                    ['class'=>'btn btn-lg btn-primary']
                                ) 
                    ?>
                </p>
            </div>

    </div>
</div>
