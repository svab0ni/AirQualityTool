<div class="modal" tabindex="-1" role="dialog" id="modalNewsletter" aria-labelledby="modalNewsletter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Subscribe to our newsletter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formNewsletter" method="post" action="/newsletter/store">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="newsletter-email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="weeklySubscription">Subscribe to weekly newsletter:</label>
                            <input type="checkbox" class="form-control" name="weeklySubscription" id="is_weekly">
                            <label for="monthlySubscription">Subscribe to monthly newsletter:</label>
                            <input type="checkbox" class="form-control" name="monthlySubscription" id="is_monthly">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" id="buttonSubscribe">Subscribe</button>
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
    $('document').ready(function () {
        let newsletterForm = $('#formNewsletter');

        newsletterForm.on('submit', function (e) {
            e.preventDefault();

            let formData = {
                '_token': '{!! csrf_token() !!}',
                'email': $('#newsletter-email').val(),
                'is_monthly': $('#is_monthly').prop('checked') ? 1 : 0,
                'is_weekly': $('#is_weekly').prop('checked') ? 1 : 0
            };

            $.ajax({
                url: '/newsletter/store',
                type: 'POST',
                data: formData,
                success:function(data){
                    console.log('DONE');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>