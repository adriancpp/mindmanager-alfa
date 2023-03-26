<style>
    .widget .panel-body { padding:0px; }
    .widget .list-group { margin-bottom: 0; }
    .widget .panel-title { display:inline }
    .widget .label-info { float: right; }
    .widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
    .widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
    .widget .mic-info { color: #666666;font-size: 11px; }
    .widget .action { margin-top:5px; }
    .widget .comment-text { font-size: 12px; }
    .widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
</style>

        <div class="container" >
            <div class="row">


                <div class="panel panel-default widget col-12 col-sm-8">

                    <div class="row p-2">
                        <div class="col-lg-12">
                            <h3 class="one">Rutynowe</h3>
                            <a href="/routine/new">
                                <button class="btn btn-success float-right">Dodaj nowy</button>
                            </a>
                        </div>
                    </div>


                    <div class="panel-body">
                        <ul class="list-group">

                            <?php foreach ($routines as $routine) : ?>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6">
                                        <div>
                                            <h4 class="card-title"><?= $routine->name ?></h4> [streak: 0dni]
                                        </div>
                                        <div class="action">
                                            <a href="/routine/edit/<?= $routine->id ?>" class="btn btn-primary">

                                                    <span class="glyphicon glyphicon-pencil">Edytuj</span>

                                            </a>
                                            <?php if($routine->active == 1): ?>
                                                <button type="button" class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-trash">Dezaktywuj</span>
                                                </button>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success btn-xs">
                                                    <span class="glyphicon glyphicon-trash">Aktywuj</span>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
