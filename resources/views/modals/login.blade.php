<div class="modal" tabindex="-1" role="dialog" id="modalLogin" aria-labelledby="modalLogin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formLogin" method="post" action="/login">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" id="buttonLogin">Prijavi se</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // $('#formLogin').on('submit', function (e) {
        //     e.preventDefault();
        //
        //     $.ajax({
        //         method: $(this).attr('method'),
        //         url: $(this).attr('action'),
        //         data: $(this).serialize(),
        //         dataType: "json"
        //     })
        //     .done(function (data) {
        //         console.log('GOOD');
        //     })
        //     .fail(function (data) {
        //
        //     })
        // })
    });
</script>