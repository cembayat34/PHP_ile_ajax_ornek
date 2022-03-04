<form action="api.php" id="new-todo-form">
    <h4>Todo Ekle</h4>
    <input type="text" name="todo" placeholder="Todo"> <br>
    <select name="type" id="">
        <option value="">Seçin</option>
        <option value="1">Ders</option>
        <option value="2">Her gün yapılacaklar</option>
        <option value="3">Sorumluluklarım</option>
    </select> <br>
    <label>
        <input type="checkbox" name="done" value="1">
        Bunu yaptım olarak işaretle
    </label> <br>
    <button>Ekle</button>
</form>

<script>
    $('#new-todo-form').on('submit', function(e){
        e.preventDefault(); // pop up açıldığında ekleye basıldığında gönderme işlemini yapmamasını sağlıyor.
        let formData = $(this).serialize(); // form içindeki değerleri serialize fonksiyonu ile almak.
        formData += '&action=new-todo'
        $.post($(this).attr('action'), formData, function(response){
            // hata varsa
            if (response.error){
                alert(response.error);
            //hata yoksa
            } else {
                // tabloda göster
                $('#todo-table tbody').prepend(response.html);
                //popup'u kapa
                $('.popup').html('');

                // eklendikten sonra rengini yeşil yapmak için inserted classını ekliyoruz ve index.php de inserted classına style veriyoruz
                $('#todo-table tbody tr:first').addClass('inserted')

                setTimeout(()=>{
                    $('#todo-table tbody tr:first').removeClass('inserted')
                },800);

            }
        },'json')
    })
</script>