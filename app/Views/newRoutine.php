<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">

                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Nowe zadanie</h3>
                    </div>
                    <div>
                        <?= view_cell('\App\Libraries\Routine::newRoutineHelpPopup', [
                                'b' => 2,
                                'a' => 1
                            ]
                        ) ?>
                    </div>
                </div>

                <hr>
                <form class="" action="/routine/new" method="post">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" name="name" id="name" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="type">Sposób zaliczenia</label>
                                <select name="type" class="form-control" onchange="checkIfShowRequiredAmount(this);">
                                    <?php foreach ($types as $type): ?>
                                        <option <?php if($type[2]==true) echo ' selected ' ?> value="<?= $type[0] ?>"><?= $type[1] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group" id="required_amount_div" style="display: none;">
                                <label for="required_amount">Próg zaliczenia</label>
                                <input type="text" class="form-control" name="required_amount" id="required_amount" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="priority">Priorytet</label>
                                <select name="priority" class="form-control">
                                    <?php foreach ($prioritys as $priority): ?>
                                        <option <?php if($priority[2]==true) echo ' selected ' ?> value="<?= $priority[0] ?>"><?= $priority[1] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="sort">Kolejność</label>
                                <input type="number" class="form-control" name="sort" id="sort" value="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="active">Stan</label>
                                <select name="active" class="form-control">
                                    <?php foreach ($actives as $active): ?>
                                        <option <?php if($active[2]==true) echo ' selected ' ?> value="<?= $active[0] ?>"><?= $active[1] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Pn</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Wt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Sr</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Czw</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Pt</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Sb</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Ndz</label>
                                </div>

                            </div>
                        </div>



                    </div>

                    <?php if(isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Zapisz</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function checkIfShowRequiredAmount(that) {
        if (that.value != "YESNO") {
            document.getElementById("required_amount_div").style.display = "block";
        } else {
            document.getElementById("required_amount_div").style.display = "none";
        }
    }
</script>