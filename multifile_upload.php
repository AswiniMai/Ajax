<script src="jquery-3.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
    $('#upload').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                alert(data);
            },
        });
    }));

    $("#image").on("change", function() {
        $("#upload").submit();
    });
});
</script>
<html>
<form id="upload" action="upload_ajax.php" method="post" enctype="multipart/form-data"> 
<input type="file" name="image[]" value="" id="image" multiple>
<input type="submit" value="Submit" onclick="submit">
</form>
</html>

