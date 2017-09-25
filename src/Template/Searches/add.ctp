<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <form action="/searches/add" method="post">
                <div class="">
                    <label for="search-term"><?= __('Enter a value:') ?></label>
                    <input id="search-term" name="search-term" type="text" required>
                </div>
                
                <input type="submit">
            </form>
        </div>
    </div>
</div>
