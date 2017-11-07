<div class="panel panel-default">
  <div class="panel-body">

      <form method="POST" action="search/submit">
        {{ csrf_field() }}
  
        <div class="input-group margin">
            <input id="search-bar" name="search" type="text" class="form-control">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">Search
              <i class="fa fa-search"></i>
              </button>
            </span>
        </div>

    </form>

  </div>
</div>

