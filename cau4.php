Số lượng khách hàng <input type="text" class="num">
<div class="divtable"></div>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.num').keydown(function(event){
            if(event.which == 13){
                var id = $('.num').val();
                $.post("xulycau4.php", {id: id}, function(data, status){
                if(status === 'success') {
                    $('.divtable').html(data);
                }}); 
            }
        });
    });
</script>
