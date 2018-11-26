<div class="modal fade" tabindex="-1" role="dialog" id="modalLogin" aria-labelledby="modalLogin">
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
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="buttonLogin">Prijavi se</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>