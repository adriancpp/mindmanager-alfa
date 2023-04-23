<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <form method="post" action="/blog/new">
            <div class="form-group">
                <label for="">Title</label>
                <input id="" class="form-control" type="text" name="post_title">
            </div>
            <div class="form-group">
                <label for="">Text</label>
                <textarea id="" class="form-control" name="post_content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-sm">Create</button>
            </div>
        </form>
    </div>
</div>



<div><?= $locale ?></div>
<div><?= lang('Dashboard.title') ?></div>


<ul class="navbar-nav my-2 my-lg-0">
    <li class="nav-item">
        <a class="dropdown-item" href="<?= base_url('lang/en'); ?>">English</a>
    </li>
    <li class="nav-item">
        <a class="dropdown-item" href="<?= base_url('lang/pl'); ?>">PL</a>
    </li>
</ul>




=======


//                echo '<pre>';
//                print_r($data);
//                echo '</pre>';

//   col              col
// AKTUALNE   |    ZROBIONE
// -----------|
// NASTEPNE   |


<div class="row">
    <div class="column">
        <div class="container">
            <div class="row">
                Aktualne
            </div>
            <div class="row">
                Nastepne xxxx
            </div>
        </div>
    </div>
    <div class="column">
        Gotowe
    </div>
</div>



Anyway u guys.
Always remeber

At the end of the day is night
and every little thing is gonna be alright
If its not alright, its not the end.



///one diev max left one max right
<div class="d-flex justify-content-between">
    <div>
        left
    </div>
    <div>
        right
    </div>
</div>

<div class="d-flex">
    <div>
        left
    </div>
    <div class="ml-auto">
        right
    </div>
</div>