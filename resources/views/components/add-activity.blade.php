<div class="panel panel--lg profile">
    <div class="panel__header col-sm-12 pad-xs--15 pad-sm--30 pad--no-top">
        <h1 class="hdg hdg--2">Add Activity</h1>
    </div>

    <form class="form" role="form" method="POST" action="{{ url('/add-activity') }}">

        {{ csrf_field() }}

        <div class="form-row clearfix">
            <div class="col-xs-12 col-sm-4 float">
                <label for="age" class="float__label">Age</label>

                <input id="age" type="age" class="float__input" name="age"
                       value="">

                @if ($errors->has('age'))
                    <span class="form__help-block">
                        <strong>{{ $errors->first('age') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-12 col-sm-4 float">
                <label for="height" class="float__label">Height</label>

                <input id="height" type="height" class="float__input" name="height"
                       value="">

                @if ($errors->has('height'))
                    <span class="form__help-block">
                        <strong>{{ $errors->first('height') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-xs-12 col-sm-4 float">
                <label for="weight" class="float__label">Weight</label>

                <input id="weight" type="weight" class="float__input" name="weight"
                       value="">

                @if ($errors->has('weight'))
                    <span class="form__help-block">
                        <strong>{{ $errors->first('weight') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row form--text-right col-sm-12 pad-sm--30 pad--no-bottom">
            <button type="submit" class="btn btn--secondary">
                Add Activity
            </button>
        </div>
    </form>
</div>