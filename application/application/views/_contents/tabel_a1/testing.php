<style>
    .btn.disabled {
        background-color: lightgray;
        border-color: lightgray;
        cursor: not-allowed;
        pointer-events: none;
    }
</style>

<form id="buttonForm" method="POST" action="/submit">
    <div class="btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-primary">
            <input type="checkbox" name="button1" autocomplete="off"> Button 1
        </label>
        <label class="btn btn-primary">
            <input type="checkbox" name="button2" autocomplete="off"> Button 2
        </label>
        <label class="btn btn-primary">
            <input type="checkbox" name="button3" autocomplete="off"> Button 3
        </label>
    </div>
    <br><br>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

<script>
    $(document).ready(function () {
        $('label.btn').on('click', function () {
            var $input = $(this).find('input');
            var isActive = $input.prop('checked');

            // Toggle the current button state
            $input.prop('checked', !isActive);
            $(this).toggleClass('active');

            // Enable or disable surrounding buttons
            if (!isActive) {
                $('label.btn').not(this).addClass('disabled').find('input').prop('disabled', true);
            } else {
                $('label.btn').not(this).removeClass('disabled').find('input').prop('disabled', false);
            }
        });

        $('#buttonForm').on('submit', function (event) {
            // Ensure only active buttons are sent
            $(this).find('input[type=checkbox]').each(function () {
                if (!$(this).prop('checked')) {
                    $(this).prop('disabled', true);
                }
            });
        });
    });
</script>