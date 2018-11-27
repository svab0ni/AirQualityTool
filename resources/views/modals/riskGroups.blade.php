<div class="modal fade" tabindex="-1" role="dialog" id="modalRiskGroup" aria-labelledby="modalRiskGroup">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Would you consider yourself: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($user = Auth::user())
                @php
                    $health = \App\Models\HealthRiskGroupUser::where('user_id', $user->id)->get();

                    $is_old = false;
                    $is_child = false;
                    $is_hearth = false;
                    $is_none = false;
                    $is_respiratory = false;

                    foreach ($health as $item )
                    {
                        if($item->healthRiskGroup->name == 'Old') $is_old = true;
                        else if($item->healthRiskGroup->name == 'Child') $is_child = true;
                        else if($item->healthRiskGroup->name == 'Hearth') $is_hearth = true;
                        else if($item->healthRiskGroup->name == 'None') $is_none = true;
                        else $is_respiratory = true;
                    }
                @endphp
                <form id="formRiskGroup" method="post" action="/assign/risk-groups">
                    @csrf
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_old_age" @if($is_old) checked @endif id="is_old_age">
                        <label for="is_old_age">Old age</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_child"  @if($is_child) checked @endif  id="is_child">
                        <label for="is_child">Child</label>

                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_respiratory"  @if($is_respiratory) checked @endif  id="is_respiratory">
                        <label for="is_respiratory">Troubled with respiratory diseases</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_hearth" @if($is_hearth) checked @endif  id="is_hearth">
                        <label for="is_hearth">Troubled with hearth diseases</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_none" @if($is_none) checked @endif id="is_none">
                        <label for="is_none">None of the above</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="buttonRiskGroups">Submit</button>
                    </div>
                </form>
                @else
                    <form id="formRiskGroup" method="post" action="/assign/risk-groups">
                        @csrf
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_old_age" id="is_old_age">
                            <label for="is_old_age">Old age</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_child" id="is_child">
                            <label for="is_child">Child</label>

                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_respiratory" id="is_respiratory">
                            <label for="is_respiratory">Troubled with respiratory diseases</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_hearth" id="is_hearth">
                            <label for="is_hearth">Troubled with hearth diseases</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_hearth" id="is_none">
                            <label for="is_hearth">None of the above</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" id="buttonRiskGroups">Submit</button>
                        </div>
                    </form>
                @endif
            </div>

        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        let riskGroups = $('#formRiskGroup');

        riskGroups.on('submit', function (e) {
            e.preventDefault();

            let formData = {
                '_token': '{!! csrf_token() !!}',
                'is_old': $('#is_old_age').prop('checked') ? 1 : 0,
                'is_child': $('#is_child').prop('checked') ? 1 : 0,
                'is_respiratory': $('#is_respiratory').prop('checked') ? 1 : 0,
                'is_hearth': $('#is_hearth').prop('checked') ? 1 : 0,
                'is_none': $('#is_none').prop('checked') ? 1 : 0
            };

            $.ajax({
                url: '/assign/risk-groups',
                type: 'POST',
                data: formData,
                success:function(data){
                    $('#modalRiskGroup').modal('toggle');
                    $('#modalConfirmNewsletter').modal('toggle');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>