<style>

    .cat{
        margin: 4px;
        background-color: #104068;
        border-radius: 4px;
        border: 1px solid #fff;
        overflow: hidden;
        float: left;
    }

    .cat label {
        float: left; line-height: 3.0em;
        width: 4.0em; height: 3.0em;
    }

    .cat label span {
        text-align: center;
        padding: 3px 0;
        display: block;
    }

    .cat label input {
        position: absolute;
        display: none;
        color: #fff !important;
    }
    /* selects all of the text within the input element and changes the color of the text */
    .cat label input + span{color: #fff;}


    /* This will declare how a selected input will look giving generic properties */
    .cat input:checked + span {
        color: #ffffff;
        text-shadow: 0 0  6px rgba(0, 0, 0, 0.8);
    }

    /*
        This following statements selects each category individually that contains an input element that is a checkbox
        and is checked (or selected) and chabges the background color of the span element.
    */

    .action input:checked + span{background-color: #F75A1B;}
    .comedy input:checked + span{background-color: #1BB8F7;}
    .crime input:checked + span{background-color: #D9D65D;}
    .history input:checked + span{background-color: #82D44E;}
</style>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="container">
                <h3>Edytuj zadanie</h3>
                <hr>
                <form class="" action="/routine/edit/<?= $routine['id'] ?>" method="post">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?= $routine['name'] ?>">
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
                            <div class="form-group" id="required_amount_div"
                                <?php
                                    foreach($types as $type)
                                        if($type[0]=="YESNO" && $type[2]==true)
                                            echo 'style="display: none;"';
                                ?>
                            >
                                <label for="required_amount">Próg zaliczenia</label>
                                <input type="text" class="form-control" name="required_amount" id="required_amount" value="<?= $routine['required_amount'] ?>">
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
                                <input type="number" class="form-control" name="sort" id="sort" value="<?= $routine['sort'] ?>">
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

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                Kategoria<br>
                                <div class="cat action">
                                    <label>
                                        <input name="category" type="checkbox" class="single-checkbox" value="SPORT"
                                            <?php if($routine['category']=='SPORT') echo ' checked ' ?>
                                        ><span>Sport</span>
                                    </label>
                                </div>

                                <div class="cat comedy">
                                    <label>
                                        <input name="category" type="checkbox" class="single-checkbox" value="CODE"
                                            <?php if($routine['category']=='CODE') echo ' checked ' ?>
                                        ><span>Projekt</span>
                                    </label>
                                </div>

                                <div class="cat crime">
                                    <label>
                                        <input name="category" type="checkbox" class="single-checkbox" value="LEARN"
                                            <?php if($routine['category']=='LEARN') echo ' checked ' ?>
                                        ><span>Nauka</span>
                                    </label>
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

                <hr>
                <details>
                    <summary>Dodatkowe Opcje</summary>
                    <td><a class='btn btn-danger' onClick="javascript: return confirm('Please confirm deletion');" href='/routine/delete/<?= $routine['id'] ?>'>Usuń rutynę wraz z historią (nie można cofnąć!)</a></td><tr>
                </details>





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

    $(document).ready(function () {
        $('input.single-checkbox').on('change', function(evt) {
            $('.single-checkbox:checked').not(this).prop('checked', false);
        });
    });
</script>