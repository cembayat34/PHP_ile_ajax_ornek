<form action="api.php" id="update-todo-form">
    <h4>Todo Düzenle</h4>
    <input type="text" name="todo" value="<?=$todo['todo']; ?>" placeholder="Todo"> <br>
    <select name="type" id="">
        <option value="">Seçin</option>
        <?php foreach (todoTypes() as $id => $type): ?>
        <option <?= $id == $todo['type'] ? 'selected' : null ?> value="<?= $id ?>"><?= $type ?></option> 
        <?php endforeach; ?>
    </select> <br>
    <label>
        <input type="checkbox" <?= $todo['done'] == 1 ? 'checked' : null ?> name="done" value="1">
        Bunu yaptım olarak işaretle
    </label> <br>
    <input type="hidden" name="id" value="<?=$todo['id']; ?>">
    <button>Güncelle</button>
</form>

<script>
    $('#update-todo-form').on('submit', function(e){
        e.preventDefault(); // pop up açıldığında ekleye basıldığında gönderme işlemini yapmamasını sağlıyor.
        let formData = $(this).serialize(); // form içindeki değerleri serialize fonksiyonu ile almak.
        formData += '&action=update-todo'
        $.post($(this).attr('action'), formData, function(response){

            // hata varsa
            if (response.error){
                alert(response.error);
            //hata yoksa
            } else {
                // tabloda göster
                const tr = $('#todo_<?=$todo['id']?>');
                tr.after(response.html);
                tr.remove();
                //popup'u kapa  
                $('.popup').html('');

                // güncellendikten sonra rengini yeşil yapmak için updated classını ekliyoruz ve index.php de updated classına style veriyoruz
                $('#todo_<?=$todo['id']; ?>').addClass('updated')
                setTimeout(()=>{
                    $('#todo_<?=$todo['id']; ?>').removeClass('updated')
                },800)
            }
        },'json')
    })
</script>