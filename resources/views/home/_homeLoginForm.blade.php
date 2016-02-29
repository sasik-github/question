<form class="form-horizontal" method="post" action="{{ action('HomeController@login') }}">

    {{  csrf_field() }}

    <div class="form-group">
        <label for="vorname" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-10">
            <input type="text" name="firstname" class="form-control" id="vorname" placeholder="Vorname" value="{{ $user->getFirstName() }}">
        </div>
    </div>

    <div class="form-group">
        <label for="nachname" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-10">
            <input type="text" name="lastname" class="form-control" id="nachname" placeholder="Nachname" value="{{ $user->getLastName() }}">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail" value="{{ $user->getEmail() }}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input name="checkbox" type="checkbox"> Hiermit akzeptiere ich die Teilnahmebedingungen für das Revell Control Online Bootcamp.
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-lg btn-primary">Online Bootcamp starten</button>
        </div>
    </div>
</form>