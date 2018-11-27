<div id="modalConfirmPhoneNumber" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <img style="height: 70px;" src="/logo.png" alt="">
                </div>
                <h4 class="modal-title">Thank You!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">You will receive SMS message with confirmation code. Please log in in order to verify your phone number.</p>
                <form id="formConfirmPhoneNumber" method="post" action="/confirm/phone-number">
                    @csrf
                    <div class="form-group">
                        <label for="phone-code-verify" class="col-form-label">Verification Code:</label>
                        <input type="number" class="form-control" name="phone-code-verify" id="phone-code-verify">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="buttonConfirmPhone">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        let confirmPhoneForm = $('#formConfirmPhoneNumber');

        confirmPhoneForm.on('submit', function (e) {
            e.preventDefault();

            let formData = {
                '_token': '{!! csrf_token() !!}',
                'phone_code': $('#phone-code-verify').val()
            };

            $.ajax({
                url: '/confirm/phone-number',
                type: 'POST',
                data: formData,
                success:function(data){
                    $('#modalConfirmPhoneNumber').modal('toggle');
                    $('#modalConfirmNewsletter').modal('toggle');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>