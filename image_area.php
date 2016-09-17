<link rel="stylesheet" type="text/css" href="selectarea/css/imgareaselect-default.css" />
  <script type="text/javascript" src="selectarea/scripts/jquery.min.js"></script>
  <script type="text/javascript" src="selectarea/scripts/jquery.imgareaselect.pack.js"></script>

<script type="text/javascript">
$(document).ready(function (e) {
    $('#upload').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url:"selectarea_ajax.php" ,
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                //alert(data);
				$("area").html(data);
            },
        });
    }));

    $("#image").on("change", function() {
        $("#upload").submit();
    });
});
$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#img').attr('src', e.target.result);
};
$(document).ready(function () {
    $('#area').imgAreaSelect({
        onSelectEnd: function (img, selection) {
			alert("Area Selected");
            $('input[name="x1"]').val(selection.x1);
            $('input[name="y1"]').val(selection.y1);
            $('input[name="x2"]').val(selection.x2);
            $('input[name="y2"]').val(selection.y2);            
        }
    });
});
</script>
<html>
<div>
<form id="upload"  method="post">
<input type="file" name="image" value="" id="image"><br><br>
<div id="area">
<img id="img" src="#" alt="your image" />
</div>
</div>
<table>
<tr><td>x1:<input id="x1" type="text" name="x1" value="" /></td></tr>
<tr><td>y1:<input id="y1" type="text" name="y1" value="" /></td></tr>
<tr><td>x2:<input id="x2" type="text" name="x2" value="" /></td></tr>
<tr><td>y2:<input id="y2" type="text" name="y2" value="" /><br><br>
<input type="submit" value="Submit" onclick="submit"></td></tr>
</table>
</form>
</html>

