<div class="modal fade" tabindex="-1" role="dialog" id="modalRegister" aria-labelledby="modalRegister">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRegister" method="post" action="/register">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="name" id="register-name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="register-email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="register-password">
                    </div>
                    <div class="form-group">
                        <label for="repeat-password" class="col-form-label">Repeat password:</label>
                        <input type="password" class="form-control" name="repeat-password" id="repeat-password">
                    </div>
                    <div class="form-group">
                        <label for="phone-number" class="col-form-label">Phone number:</label>
                        <input type="number" class="form-control" name="phone-number" id="phone-number">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="buttonRegister">Register</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        let registerForm = $('#formRegister');

        registerForm.on('submit', function (e) {
            e.preventDefault();

            let formData = {
                '_token': '{!! csrf_token() !!}',
                'email': $('#register-email').val(),
                'name': $('#register-name').val(),
                'password': $('#register-password').val(),
                'repeat_password': $('#repeat-password').val(),
                'phone_number': $('#phone-number').val()
            };

            $.ajax({
                url: '/register',
                type: 'POST',
                data: formData,
                success:function(data){
                    $('#modalRegister').modal('toggle');
                    $('#modalConfirmNewsletter').modal('toggle');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>