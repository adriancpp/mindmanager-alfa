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
                    <?php

                    echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Please confirm deletion');\" href='/routine/delete/2'>Usuń rutynę wraz z historią (nie można cofnąć!)</a></td><tr>";
                    ?>
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
</script>