
<!--<input type="checkbox" class="justify-content-center" name="checkbox_id" id="checkbox_id" checked data-toggle="toggle" data-on="Submission Form is Visible" data-off="Submission Form is Closed" data-onstyle="success" data-width="300" data-height="75">-->

<div id="togglehide" class="my-5 justify-content-center">
    <form id="formstuff" action="phpsession.php" method="post">
        <p><sub style="color: grey">'Enable' or 'Disable' the Form for all clients below..</sub></p>
    <label for="checkbox_id">

    <input type="radio" id="rad" name="rad" value="on">
    <label for="on">Form On</label><br>
    <input type="radio" id="rad" name="rad" value="off">
    <label for="off">Form Off</label><br>
        <button id="butt" type="submit" name="butt" >Submit</button>
    </form>
</div>
<script>

    $('#toggleForm').change(function() {
        alert("please work");
        if ($(this).val() === "off") {
            $(".butt").attr('disabled', true);
        } else {
            $(".butt").attr('disabled', false);
            }
    }


$('#toggleForm').on('change', function(){
    $.get("phpsession.php");
});
$('#checkbox_id').click(function() {
    if (!$(this).is(':checked')) {
        alert("You entered p1!");
        $.get("phpsession.php");
    }
});
$('#checkbox_id').click(function(){
    $.get("phpsession.php");
    alert("You entered p1!");
}))
</script>