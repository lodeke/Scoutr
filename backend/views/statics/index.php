<?php
$this->title = 'Site statics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">

    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <h4 class="card-title">
                    <b><i class="flaticon-analytics"></i> Visitor traffic Information</b>
                </h4>
            </div>

        </div>

        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Visitor Agent</th>
                    <th>Visitor Browser</th>
                    <th>Visitor System</th>
                    <th>Visitor iP</th>
                    <th>Visitor City / Country</th>
                    <th>Refer Url</th>
                    <th>Page View</th>

                </tr>
                <?php
                foreach($all as $list)
                {
                    ?>
                    <tr>

                        <td><?= \common\models\Track::ExactOs($list['agent']) ; ?></td>
                        <td><?= \common\models\Track::ExactBrowserName($list['agent']) ; ?></td>
                        <td> <?= $list['system']; ?></td>
                        <td> <?= $list['ip']; ?></td>
                        <td><?= $list['city']; ?> - <?= $list['country']; ?></td>
                        <td>
                            <a target="_blank" href="<?= $list['ref']; ?>">
                                <?= $list['ref']; ?>
                            </a>
                        </td>
                        <td>
                            <div style="word-wrap: break-word">
                                <?php
                                $data = explode(',',$list['page_view']);
                                foreach($data as $link)
                                {
                                    echo "<a href='$link' target='_blank'>$link</a><br>";
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php

                }
                ?>
            </table>
            <?php
            // display pagination

            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);

            ?>
        </div>

    </div>


</div>
